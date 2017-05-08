var require = meteorInstall({"client":{"main.html":["./template.main.js",function(require,exports,module){

///////////////////////////////////////////////////////////////////////
//                                                                   //
// client/main.html                                                  //
//                                                                   //
///////////////////////////////////////////////////////////////////////
                                                                     //
module.exports = require("./template.main.js");                      // 1
                                                                     // 2
///////////////////////////////////////////////////////////////////////

}],"template.main.js":function(){

///////////////////////////////////////////////////////////////////////
//                                                                   //
// client/template.main.js                                           //
//                                                                   //
///////////////////////////////////////////////////////////////////////
                                                                     //
                                                                     // 1
Template.__checkName("hello");                                       // 2
Template["hello"] = new Template("Template.hello", (function() {     // 3
  var view = this;                                                   // 4
  return [ HTML.Raw("<button>Wcisnij tutaj</button>\n  "), HTML.P("You've pressed the button ", Blaze.View("lookup:counter", function() {
    return Spacebars.mustache(view.lookup("counter"));               // 6
  }), " times.") ];                                                  // 7
}));                                                                 // 8
                                                                     // 9
Template.__checkName("info");                                        // 10
Template["info"] = new Template("Template.info", (function() {       // 11
  var view = this;                                                   // 12
  return HTML.Raw('<h2>Learn Meteor!</h2>\n  <ul>\n    <li><a href="https://www.meteor.com/try" target="_blank">Do the Tutorial</a></li>\n    <li><a href="http://guide.meteor.com" target="_blank">Follow the Guide</a></li>\n    <li><a href="https://docs.meteor.com" target="_blank">Read the Docs</a></li>\n    <li><a href="https://forums.meteor.com" target="_blank">Discussions</a></li>\n  </ul>');
}));                                                                 // 14
                                                                     // 15
///////////////////////////////////////////////////////////////////////

},"main.js":["meteor/templating","meteor/reactive-var","./main.html",function(require,exports,module){

///////////////////////////////////////////////////////////////////////
//                                                                   //
// client/main.js                                                    //
//                                                                   //
///////////////////////////////////////////////////////////////////////
                                                                     //
var Template = void 0;                                               // 1
module.importSync("meteor/templating", {                             // 1
  Template: function (v) {                                           // 1
    Template = v;                                                    // 1
  }                                                                  // 1
}, 0);                                                               // 1
var ReactiveVar = void 0;                                            // 1
module.importSync("meteor/reactive-var", {                           // 1
  ReactiveVar: function (v) {                                        // 1
    ReactiveVar = v;                                                 // 1
  }                                                                  // 1
}, 1);                                                               // 1
module.importSync("./main.html");                                    // 1
Template.hello.onCreated(function () {                               // 6
  function helloOnCreated() {                                        // 6
    // counter starts at 0                                           // 7
    this.counter = new ReactiveVar(0);                               // 8
  }                                                                  // 9
                                                                     //
  return helloOnCreated;                                             // 6
}());                                                                // 6
Template.hello.helpers({                                             // 11
  counter: function () {                                             // 12
    return Template.instance().counter.get();                        // 13
  }                                                                  // 14
});                                                                  // 11
Template.hello.events({                                              // 17
  'click button': function (event, instance) {                       // 18
    // increment the counter when button is clicked                  // 19
    instance.counter.set(instance.counter.get() + 1);                // 20
  }                                                                  // 21
});                                                                  // 17
///////////////////////////////////////////////////////////////////////

}]}},{"extensions":[".js",".json",".html",".css"]});
require("./client/template.main.js");
require("./client/main.js");