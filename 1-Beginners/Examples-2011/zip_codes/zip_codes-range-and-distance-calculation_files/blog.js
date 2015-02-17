YAHOO.namespace("Blog");
YAHOO.Blog.relativeBasePath = '/';
YAHOO.Blog.recaptchaKey = '6LfHX7sSAAAAAP4U6M3uanQCXa4C7EZ7AGArR4jc';

// debug console
if (YAHOO.widget.Logger)  
YAHOO.widget.Logger.enableBrowserConsole();

// set quirks and sync IFRAME flags

var YUI_IE_QUIRKS = (YAHOO.env.ua.ie && document.compatMode == "BackCompat");
var YUI_IE_SYNC = (YAHOO.env.ua.ie == 6 || YUI_IE_QUIRKS);
YAHOO.log('YUI_IE_QUIRKS: ' + YUI_IE_QUIRKS);
YAHOO.log('YUI_IE_SYNC: ' + YUI_IE_SYNC);

function ajaxLoaderHtml(msg) 
{
    if (typeof msg == 'undefined') msg = 'Loading...';
    
    var imageUrl = YAHOO.Blog.relativeBasePath + 'themes/default/images/ajax-loader.gif';
    
    var html = '<img src="' + imageUrl + '" style="vertical-align: middle; margin-right: 10px;"';
    html = html + 'alt="Loading..."/>' + msg;
    
    return html;
}

function messageDialog(header, msg)
{
    if (!YAHOO.Blog.messageDialog)
    {
        var handleClose = function() {
            YAHOO.Blog.messageDialog.hide();
        };
        
        YAHOO.Blog.messageDialog = new YAHOO.widget.SimpleDialog(
            'messageDialog',
            {  
                visible:                false, 
                constraintoviewport:    true,
                underlay:               "shadow",
                width:                  '300px',
                buttons:                [{ text:"OK", handler:handleClose, isDefault:true }]
            } 
        );
    }
 
    YAHOO.Blog.messageDialog.setHeader(header); 
    YAHOO.Blog.messageDialog.setBody(msg);
    YAHOO.Blog.messageDialog.render(document.body);
    YAHOO.Blog.messageDialog.center();
    YAHOO.Blog.messageDialog.show();
}

function ajaxLoaderDialog(msg, show)
{
    if (typeof show == 'undefined') show = true;
    
    if (!YAHOO.Blog.ajaxLoaderDialog)
    {
        YAHOO.Blog.ajaxLoaderDialog = new YAHOO.widget.Panel("ajaxLoaderDialog",
            {
                width: "400px",
                close: false,
                visible: true,
                underlay: "shadow",
                draggable: false,
                modal: true,
                fixedcenter: true
            }
        );
        
        YAHOO.Blog.ajaxLoaderDialog.setBody(ajaxLoaderHtml(msg)); 
        YAHOO.Blog.ajaxLoaderDialog.render(document.body);
    }
    
    if (show)
    {
        YAHOO.Blog.ajaxLoaderDialog.setBody(ajaxLoaderHtml(msg)); 
        YAHOO.Blog.ajaxLoaderDialog.center();
        YAHOO.Blog.ajaxLoaderDialog.show();
    }
        
    return YAHOO.Blog.ajaxLoaderDialog;
}

function initRecaptcha(recaptchaDiv, submitButton)
{
    YAHOO.log("Initializing reCAPTCHA");
    document.getElementById(submitButton).disabled = true;
    Recaptcha.create(YAHOO.Blog.recaptchaKey,
    recaptchaDiv, {
       theme: "red",
       callback: function() { document.getElementById(submitButton).disabled = false; }
    });
}

function hijackForm(formId, msg, timeout, successCallback, failureCallback)
{
    YAHOO.log('Hijacking form "' + formId + '"');
    var formObj = document.getElementById(formId);
    
    if (typeof successCallback == 'undefined') successCallback = false;
    if (typeof failureCallback == 'undefined') failureCallback = false;
    
    var submitFunc = function(e)
    {
        var postUrl = formObj.action;   
        var loadDialog = ajaxLoaderDialog(msg);
        
        var failureFunc = function(o)
        {
            loadDialog.hide();
            YAHOO.log("AJAX request failed!");
            if (failureCallback) failureCallback();
            messageDialog('Error!', 'An unknown error occured while trying to process your request. Please try again later.');
        }
        
        var successFunc = function(o)
        {
            var str = o.responseText;
            loadDialog.hide();
            
            try
            {
                var response = YAHOO.lang.JSON.parse(str);
                
                if (response.Code == 0)
                {
                    formObj.reset();
                    YAHOO.log(response.Code + ' - ' + response.Text);
                    if (successCallback) successCallback();
                    messageDialog('Success', response.Text);
                }
                else
                {                    
                    YAHOO.log(response.Code + ' - ' + response.Text);
                    if (failureCallback) failureCallback();
                    messageDialog('Error!', response.Text);
                }
                
            }
            catch (e) 
            {
                YAHOO.log(e);
                if (failureCallback) failureCallback();
                messageDialog('Error!', 'An unknown error occured while trying to process your request. Please try again later.');
            }
        }

        var callback = 
        {
            failure: failureFunc,
            success: successFunc,
            timeout: timeout
        }
        
        // prevent the default submit event from occuring
        YAHOO.util.Event.preventDefault(e);
        
        // submit the form
        YAHOO.util.Connect.setForm(formObj);
        YAHOO.util.Connect.asyncRequest('POST', postUrl, callback);
    }
    
    YAHOO.util.Event.addListener(formObj, 'submit', submitFunc);
}


function getScrollTop(){
    if(typeof pageYOffset!= 'undefined'){
        //most browsers
        return pageYOffset;
    }
    else{
        var B= document.body; //IE 'quirks'
        var D= document.documentElement; //IE with doctype
        D= (D.clientHeight)? D: B;
        return D.scrollTop;
    }
}

