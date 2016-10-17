<div class="modal fade" id="Contact" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content" style="background: #fafafa;">

       <div id="_AJAX_CONTACT_"></div>

       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="text-xs-center">
           <h3><i class="fa fa-envelope"></i> Write to us:</h3>
           <hr class="m-t-2 m-b-2">
         </div>
       </div>
       <div class="modal-body">
         <div role="form" onkeypress="return runScriptContact(event)">
           <div class="group">
             <input type="text" id="name" name="name">
             <span class="highlight"></span><span class="bar"></span>
             <label for="name">Your Name</label>
           </div>
           <div class="group">
             <input type="text" id="email" name="email">
             <span class="highlight"></span><span class="bar"></span>
             <label for="email">Your Email</label>
           </div>
           <div class="group">
             <input type="text" id="subject" name="subject">
             <span class="highlight"></span><span class="bar"></span>
             <label for="subject">Subject</label>
           </div>
           <div class="group">
             <input type="text" id="message" name="message">
             <span class="highlight"></span><span class="bar"></span>
             <label for="message">Message </label>
           </div>
         </div>
         <button type="button" class="button" onclick="goContact()">Send
             <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
         </button>
       </div>
       <div class="modal-footer">
         <div class="call">
            <br>
            <p>Or would you prefer to call?
                <br>
                <span><i class="fa fa-phone"> </i></span> + 01 234 565 280</p>
        </div>
       </div>
     </div>
   </div>
 </div>


<script src="views/app/js/contact.js"></script>
