/**
 *  NOTE - this file should be editted at
 *  /lib/connect/Facebook/XdComm/XdCommReceiver.js
 *  which will rewrite any library file connect is autogened
 *
 *  @provides XdCommReceiver
 *  @requires
 */

// Create FBIntern namespace if necessary
if (!window.FBIntern) {
  FBIntern = {};
}

// Only load if this class is not already loaded
if (!FBIntern.XdReceiver) {
  // XdReceiver class
  FBIntern.XdReceiver = {
    delay : 100,
    timerId : -1,
    dispatchMessage: function() {
      //We don't used window.location.hash because it has different behavior on IE and Firefox.
      //See https://bugzilla.mozilla.org/show_bug.cgi?id=378962
      var pathname = document.URL;
      var hashIndex = pathname.indexOf('#');
      var hash;
      if(hashIndex > 0) {
        hash = pathname.substring(hashIndex + 1);
      } else {
        //hashIndex not found;
        //Check if it's special case for login callback
        hashIndex = pathname.indexOf('fb_login&');
        if(hashIndex > 0) {
          hash = pathname.substring(hashIndex + 9);
        } else {
          return;
        }
      }

      var debugFlag='debug=1&';
      if(hash.indexOf(debugFlag) == 0) {
        hash = hash.substring(debugFlag.length);
      }

      var packet_string;
      var func = null;
      try {
        var hostWindow = window.parent;
        if (hash.indexOf('fname=') == 0) {
          var packetStart = hash.indexOf('&');
          var frame_name = hash.substr(6, packetStart-6);
          if(frame_name == "_opener") {
            hostWindow = hostWindow.opener;
          } else if (frame_name == "_oparen") {
            hostWindow = hostWindow.opener.parent;
          } else if (frame_name != "_parent") {
            hostWindow = hostWindow.frames[frame_name];
          }
          packet_string = hash.substr(packetStart+1);
        } else {
          hostWindow = hostWindow.parent;
          packet_string = hash;
        }

        func = hostWindow.FB.XdComm.Server.singleton.onReceiverLoaded;
      } catch (e) {
        if (e.number == -2146828218) {
          //Permission denied
          return;
        }
      }

      if(func) {
        hostWindow.FB.XdComm.Server.singleton.onReceiverLoaded(packet_string);
        if(FBIntern.XdReceiver.timerId != -1) {
          window.clearInterval(FBIntern.XdReceiver.timerId);
          FBIntern.XdReceiver.timerId = -1;
        }
      } else {
        if(FBIntern.XdReceiver.timerId == -1) {
          try {
            FBIntern.XdReceiver.timerId = window.setInterval(FBIntern.XdReceiver.dispatchMessage, FBIntern.XdReceiver.delay);
          } catch (e) {
          }
        }
      }
    }
  };

  if (!(window.FB && FB.Bootstrap && !FB.Bootstrap.isXdChannel)) {
    try {
      FBIntern.XdReceiver.dispatchMessage();
    }
    catch(e) {
    }
  }
 }


(function() {
  // get script tag and see if it has an apikey
  // if there is an api key then call FB.init
  var scripts = document.getElementsByTagName('script');
  var this_script_tag = scripts[scripts.length - 1]; //script tag of this file
  if (this_script_tag != undefined) {
    var apikey = this_script_tag.getAttribute('fb-api-key');
    var receiver = this_script_tag.getAttribute('fb-xd-receiver');
    if (apikey != null) {
      window.setTimeout(
        function() {
          FB.init(apikey, receiver);
        },
        0);
    }
  }
})();

