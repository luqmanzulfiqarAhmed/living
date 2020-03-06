       /** 
           Vanilla JS version of the jQuery-menu-aim plugin (+ minor changes)
           https://github.com/kamens/jQuery-menu-aim
        */
       (function() {
        var menuAim = function(opts) {
          init(opts);
        };
      
        window.menuAim = menuAim;
      
        function init(opts) {
          // https://gomakethings.com/vanilla-javascript-version-of-jquery-extend/
          var extend = function () {
            // Variables
            var extended = {};
            var deep = false;
            var i = 0;
            var length = arguments.length;
      
            // Check if a deep merge
            if ( Object.prototype.toString.call( arguments[0] ) === '[object Boolean]' ) {
              deep = arguments[0];
              i++;
            }
      
            // Merge the object into the extended object
            var merge = function (obj) {
              for ( var prop in obj ) {
                if ( Object.prototype.hasOwnProperty.call( obj, prop ) ) {
                  // If deep merge and property is an object, merge properties
                  if ( deep && Object.prototype.toString.call(obj[prop]) === '[object Object]' ) {
                    extended[prop] = extend( true, extended[prop], obj[prop] );
                  } else {
                    extended[prop] = obj[prop];
                  }
                }
              }
            };
      
            // Loop through each object and conduct a merge
            for ( ; i < length; i++ ) {
              var obj = arguments[i];
              merge(obj);
            }
      
            return extended;
          };
      
          var activeRow = null,
            mouseLocs = [],
            lastDelayLoc = null,
            timeoutId = null,
            options = extend({
              menu: '',
              rows: false, //if false, get direct children - otherwise pass nodes list
              submenuSelector: "*",
              submenuDirection: "right",
              tolerance: 75,  // bigger = more forgivey when entering submenu
              enter: function(){},
              exit: function(){},
              activate: function(){},
              deactivate: function(){},
              exitMenu: function(){}
            }, opts),
            menu = options.menu;
      
          var MOUSE_LOCS_TRACKED = 3,  // number of past mouse locations to track
            DELAY = 300;  // ms delay when user appears to be entering submenu
      
          /**
           * Keep track of the last few locations of the mouse.
           */
          var mousemoveDocument = function(e) {
            mouseLocs.push({x: e.pageX, y: e.pageY});
      
            if (mouseLocs.length > MOUSE_LOCS_TRACKED) {
              mouseLocs.shift();
            }
          };
      
          /**
           * Cancel possible row activations when leaving the menu entirely
           */
          var mouseleaveMenu = function() {
            if (timeoutId) {
              clearTimeout(timeoutId);
            }
      
            // If exitMenu is supplied and returns true, deactivate the
            // currently active row on menu exit.
            if (options.exitMenu(this)) {
              if (activeRow) {
                options.deactivate(activeRow);
              }
      
              activeRow = null;
            }
          };
      
          /**
           * Trigger a possible row activation whenever entering a new row.
           */
          var mouseenterRow = function() {
            if (timeoutId) {
              // Cancel any previous activation delays
              clearTimeout(timeoutId);
            }
      
            options.enter(this);
            possiblyActivate(this);
          },
          mouseleaveRow = function() {
            options.exit(this);
          };
      
          /*
           * Immediately activate a row if the user clicks on it.
           */
          var clickRow = function() {
            activate(this);
          };
      
          /**
           * Activate a menu row.
           */
          var activate = function(row) {
            if (row == activeRow) {
              return;
            }
      
            if (activeRow) {
              options.deactivate(activeRow);
            }
      
            options.activate(row);
            activeRow = row;
          };
      
          /**
           * Possibly activate a menu row. If mouse movement indicates that we
           * shouldn't activate yet because user may be trying to enter
           * a submenu's content, then delay and check again later.
           */
          var possiblyActivate = function(row) {
            var delay = activationDelay();
      
            if (delay) {
              timeoutId = setTimeout(function() {
                possiblyActivate(row);
              }, delay);
            } else {
              activate(row);
            }
          };
      
          /**
           * Return the amount of time that should be used as a delay before the
           * currently hovered row is activated.
           *
           * Returns 0 if the activation should happen immediately. Otherwise,
           * returns the number of milliseconds that should be delayed before
           * checking again to see if the row should be activated.
           */ 
          // !!!
          function is(elem, selector){ //elem is an element, selector is an element, an array or elements, or a string selector for `document.querySelectorAll`
            if(selector.nodeType){
              return elem === selector;
            }
      
            var qa = (typeof(selector) === 'string' ? document.querySelectorAll(selector) : selector),
              length = qa.length,
              returnArr = [];
      
            while(length--){
              if(qa[length] === elem){
                return true;
              }
            }
      
            return false;
          };
      
          var activationDelay = function(){
            if (!activeRow || !is(activeRow, options.submenuSelector)) {
              // If there is no other submenu row already active, then
              // go ahead and activate immediately.
              return 0;
            }
      
            function getOffset(element) {
              var rect = element.getBoundingClientRect();
              return { top: rect.top + window.pageYOffset, left: rect.left + window.pageXOffset };
            };
      
            var offset = getOffset(menu),
              upperLeft = {
                  x: offset.left,
                  y: offset.top - options.tolerance
              },
              upperRight = {
                  x: offset.left + menu.offsetWidth,
                  y: upperLeft.y
              },
              lowerLeft = {
                  x: offset.left,
                  y: offset.top + menu.offsetHeight + options.tolerance
              },
              lowerRight = {
                  x: offset.left + menu.offsetWidth,
                  y: lowerLeft.y
              },
              loc = mouseLocs[mouseLocs.length - 1],
              prevLoc = mouseLocs[0];
      
            if (!loc) {
              return 0;
            }
      
            if (!prevLoc) {
              prevLoc = loc;
            }
      
            if (prevLoc.x < offset.left || prevLoc.x > lowerRight.x || prevLoc.y < offset.top || prevLoc.y > lowerRight.y) {
              // If the previous mouse location was outside of the entire
              // menu's bounds, immediately activate.
              return 0;
            }
      
            if (lastDelayLoc && loc.x == lastDelayLoc.x && loc.y == lastDelayLoc.y) {
              // If the mouse hasn't moved since the last time we checked
              // for activation status, immediately activate.
              return 0;
            }
      
            // Detect if the user is moving towards the currently activated
            // submenu.
            //
            // If the mouse is heading relatively clearly towards
            // the submenu's content, we should wait and give the user more
            // time before activating a new row. If the mouse is heading
            // elsewhere, we can immediately activate a new row.
            //
            // We detect this by calculating the slope formed between the
            // current mouse location and the upper/lower right points of
            // the menu. We do the same for the previous mouse location.
            // If the current mouse location's slopes are
            // increasing/decreasing appropriately compared to the
            // previous's, we know the user is moving toward the submenu.
            //
            // Note that since the y-axis increases as the cursor moves
            // down the screen, we are looking for the slope between the
            // cursor and the upper right corner to decrease over time, not
            // increase (somewhat counterintuitively).
            function slope(a, b) {
              return (b.y - a.y) / (b.x - a.x);
            };
      
            var decreasingCorner = upperRight,
              increasingCorner = lowerRight;
      
            // Our expectations for decreasing or increasing slope values
            // depends on which direction the submenu opens relative to the
            // main menu. By default, if the menu opens on the right, we
            // expect the slope between the cursor and the upper right
            // corner to decrease over time, as explained above. If the
            // submenu opens in a different direction, we change our slope
            // expectations.
            if (options.submenuDirection == "left") {
              decreasingCorner = lowerLeft;
              increasingCorner = upperLeft;
            } else if (options.submenuDirection == "below") {
              decreasingCorner = lowerRight;
              increasingCorner = lowerLeft;
            } else if (options.submenuDirection == "above") {
              decreasingCorner = upperLeft;
              increasingCorner = upperRight;
            }
      
            var decreasingSlope = slope(loc, decreasingCorner),
              increasingSlope = slope(loc, increasingCorner),
              prevDecreasingSlope = slope(prevLoc, decreasingCorner),
              prevIncreasingSlope = slope(prevLoc, increasingCorner);
      
            if (decreasingSlope < prevDecreasingSlope && increasingSlope > prevIncreasingSlope) {
              // Mouse is moving from previous location towards the
              // currently activated submenu. Delay before activating a
              // new menu row, because user may be moving into submenu.
              lastDelayLoc = loc;
              return DELAY;
            }
      
            lastDelayLoc = null;
            return 0;
          };
      
          /**
           * Hook up initial menu events
           */
          menu.addEventListener('mouseleave', mouseleaveMenu);  
          var rows = (options.rows) ? options.rows : menu.children;
          if(rows.length > 0) {
            for(var i = 0; i < rows.length; i++) {(function(i){
              rows[i].addEventListener('mouseenter', mouseenterRow);  
              rows[i].addEventListener('mouseleave', mouseleaveRow);
              rows[i].addEventListener('click', clickRow);  
            })(i);}
          }
          
          document.addEventListener('mousemove', function(event){
            (!window.requestAnimationFrame) ? mousemoveDocument(event) : window.requestAnimationFrame(function(){mousemoveDocument(event);});
          });
        };
      }());
      
      (function() {
        // Responsive Sidebar Navigation - by CodyHouse.co
        var searchInput = document.getElementsByClassName('js-cd-search')[0],
          navList = document.getElementsByClassName('js-cd-nav__list')[0];
        if( searchInput && navList) {
          var sidebar = document.getElementsByClassName('js-cd-side-nav')[0],
            mainHeader = document.getElementsByClassName('js-cd-main-header')[0],
            mobileNavTrigger = document.getElementsByClassName('js-cd-nav-trigger')[0],
            dropdownItems = document.getElementsByClassName('js-cd-item--has-children');
          
          //on resize, move search and top nav position according to window width
          var resizing = false;
          window.addEventListener('resize', function(){
            if(resizing) return;
            resizing = true;
            (!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
          });
          window.dispatchEvent(new Event('resize'));//trigger the moveNavigation function
      
          //on mobile, open sidebar when clicking on menu icon
          mobileNavTrigger.addEventListener('click', function(event){
            event.preventDefault();
            var toggle = !Util.hasClass(sidebar, 'cd-side-nav--is-visible');
            if(toggle) expandSidebarItem();
            Util.toggleClass(sidebar, 'cd-side-nav--is-visible', toggle);
            Util.toggleClass(mobileNavTrigger, 'cd-nav-trigger--nav-is-visible', toggle);
          });
      
          // on mobile -> show subnavigation on click
          for(var i = 0; i < dropdownItems.length; i++) {
            (function(i){
              dropdownItems[i].children[0].addEventListener('click', function(event){
                if(checkMQ() == 'mobile') {
                  event.preventDefault();
                  var item = event.target.parentNode;
                  Util.toggleClass(item, 'cd-side__item--expanded', !Util.hasClass(item, 'cd-side__item--expanded'));
                }
              });
            })(i);
          }
          
          //on desktop - differentiate between a user trying to hover over a dropdown item vs trying to navigate into a submenu's contents
          var listItems = sidebar.querySelectorAll('.js-cd-side__list > li');
          new menuAim({
            menu: sidebar,
            activate: function(row) {
              Util.addClass(row, 'hover');
            },
            deactivate: function(row) {
              Util.removeClass(row, 'hover');
            },
            exitMenu: function() {
              hideHoveredItems();
              return true;
            },
            rows: listItems,
            submenuSelector: '.js-cd-item--has-children',
          });
      
          function moveNavigation(){ // move searchInput and navList
            var mq = checkMQ();
            if ( mq == 'mobile' && !Util.hasClass(navList.parentNode, 'js-cd-side-nav') ) {
              detachElements();
              sidebar.appendChild(navList);
              sidebar.insertBefore(searchInput, sidebar.firstElementChild);
            } else if ( mq == 'desktop' && !Util.hasClass(navList.parentNode, 'js-cd-main-header') ) {
              detachElements();
              mainHeader.appendChild(navList);
              mainHeader.insertBefore(searchInput, mainHeader.firstElementChild.nextSibling);
            }
            checkSelected(mq);
            resizing = false;
          };
      
          function detachElements() { // remove element from DOM
            searchInput.parentNode.removeChild(searchInput);
            navList.parentNode.removeChild(navList);
          };
      
          function hideHoveredItems() { // exit sidebar -> hide dropdown
            var hoveredItems = sidebar.getElementsByClassName('hover');
            for(var i = 0; i < hoveredItems.length; i++) Util.removeClass(hoveredItems[i], 'hover');
          };
      
          function checkMQ() { // check if mobile or desktop device
            return window.getComputedStyle(mainHeader, '::before').getPropertyValue('content').replace(/'|"/g, "");
          };
      
          function expandSidebarItem() { // show dropdown of the selected sidebar item
            Util.addClass(sidebar.getElementsByClassName('cd-side__item--selected')[0], 'cd-side__item--expanded');
          };
      
          function checkSelected(mq) {
            // on desktop, remove expanded class from items (js-cd-item--has-children) that were expanded on mobile version
            if( mq == 'desktop' ) {
              for(var i = 0; i < dropdownItems.length; i++) Util.removeClass(dropdownItems[i], 'cd-side__item--expanded');
            };
          }
        }
      }());
      // Utility function
      function Util () {};
      
      /* 
          class manipulation functions
      */
      Util.hasClass = function(el, className) {
          if (el.classList) return el.classList.contains(className);
          else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
      };
      
      Util.addClass = function(el, className) {
          var classList = className.split(' ');
           if (el.classList) el.classList.add(classList[0]);
           else if (!Util.hasClass(el, classList[0])) el.className += " " + classList[0];
           if (classList.length > 1) Util.addClass(el, classList.slice(1).join(' '));
      };
      
      Util.removeClass = function(el, className) {
          var classList = className.split(' ');
          if (el.classList) el.classList.remove(classList[0]);	
          else if(Util.hasClass(el, classList[0])) {
              var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
              el.className=el.className.replace(reg, ' ');
          }
          if (classList.length > 1) Util.removeClass(el, classList.slice(1).join(' '));
      };
      
      Util.toggleClass = function(el, className, bool) {
          if(bool) Util.addClass(el, className);
          else Util.removeClass(el, className);
      };
      
      Util.setAttributes = function(el, attrs) {
        for(var key in attrs) {
          el.setAttribute(key, attrs[key]);
        }
      };
      
      /* 
        DOM manipulation
      */
      Util.getChildrenByClassName = function(el, className) {
        var children = el.children,
          childrenByClass = [];
        for (var i = 0; i < el.children.length; i++) {
          if (Util.hasClass(el.children[i], className)) childrenByClass.push(el.children[i]);
        }
        return childrenByClass;
      };
      
      /* 
          Animate height of an element
      */
      Util.setHeight = function(start, to, element, duration, cb) {
          var change = to - start,
              currentTime = null;
      
        var animateHeight = function(timestamp){  
          if (!currentTime) currentTime = timestamp;         
          var progress = timestamp - currentTime;
          var val = parseInt((progress/duration)*change + start);
          element.setAttribute("style", "height:"+val+"px;");
          if(progress < duration) {
              window.requestAnimationFrame(animateHeight);
          } else {
              cb();
          }
        };
        
        //set the height of the element before starting animation -> fix bug on Safari
        element.setAttribute("style", "height:"+start+"px;");
        window.requestAnimationFrame(animateHeight);
      };
      
      /* 
          Smooth Scroll
      */
      
      Util.scrollTo = function(final, duration, cb) {
        var start = window.scrollY || document.documentElement.scrollTop,
            currentTime = null;
            
        var animateScroll = function(timestamp){
            if (!currentTime) currentTime = timestamp;        
          var progress = timestamp - currentTime;
          if(progress > duration) progress = duration;
          var val = Math.easeInOutQuad(progress, start, final-start, duration);
          window.scrollTo(0, val);
          if(progress < duration) {
              window.requestAnimationFrame(animateScroll);
          } else {
            cb && cb();
          }
        };
      
        window.requestAnimationFrame(animateScroll);
      };
      
      /* 
        Focus utility classes
      */
      
      //Move focus to an element
      Util.moveFocus = function (element) {
        if( !element ) element = document.getElementsByTagName("body")[0];
        element.focus();
        if (document.activeElement !== element) {
          element.setAttribute('tabindex','-1');
          element.focus();
        }
      };
      
      /* 
        Misc
      */
      
      Util.getIndexInArray = function(array, el) {
        return Array.prototype.indexOf.call(array, el);
      };
      
      Util.cssSupports = function(property, value) {
        if('CSS' in window) {
          return CSS.supports(property, value);
        } else {
          var jsProperty = property.replace(/-([a-z])/g, function (g) { return g[1].toUpperCase();});
          return jsProperty in document.body.style;
        }
      };
      
      /* 
          Polyfills
      */
      //Closest() method
      if (!Element.prototype.matches) {
          Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
      }
      
      if (!Element.prototype.closest) {
          Element.prototype.closest = function(s) {
              var el = this;
              if (!document.documentElement.contains(el)) return null;
              do {
                  if (el.matches(s)) return el;
                  el = el.parentElement || el.parentNode;
              } while (el !== null && el.nodeType === 1); 
              return null;
          };
      }
      
      //Custom Event() constructor
      if ( typeof window.CustomEvent !== "function" ) {
      
        function CustomEvent ( event, params ) {
          params = params || { bubbles: false, cancelable: false, detail: undefined };
          var evt = document.createEvent( 'CustomEvent' );
          evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
          return evt;
         }
      
        CustomEvent.prototype = window.Event.prototype;
      
        window.CustomEvent = CustomEvent;
      }
      
      /* 
          Animation curves
      */
      Math.easeInOutQuad = function (t, b, c, d) {
          t /= d/2;
          if (t < 1) return c/2*t*t + b;
          t--;
          return -c/2 * (t*(t-2) - 1) + b;
      };document.getElementsByTagName("html")[0].className += " js"