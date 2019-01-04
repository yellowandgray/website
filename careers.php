<html lang="en">    
    <?php $page = 'careers';
    include 'head.php'; ?>    
    <body>        
        <!--==========================          
        Header        
        ============================-->        
<?php include 'menu.php' ?>        
        <div class="banner-w3layouts nine">            
            <div class="banner-w3layouts-info nine">               
                <!--/search_form -->                
                <div id="banner-w3layouts-info" class="search_top text-center">                   
                    <h3><strong>Careers</strong></h3>                    
                    <ol class="breadcrumb justify-content-center">                        
                        <li class="breadcrumb-item">                            
                            <a href="index.php">Home</a>                        
                        </li>                        
                        <li class="breadcrumb-item active">Careers</li>                    
                    </ol>                
                </div>                
                <!--//banner-w3layouts-info -->            
            </div>        
        </div>        
        <section id="custome">           
            <div class="container">              
                <header class="section-header">    
                    <h3>CAREERS</h3>          
                    <p style="text-align: left">We owe our success to our highly motivated and talented employees. We consider our employees as our most valuable asset and are committed to provide full encouragement and support to them to enhance their potential and contribute towards company’s progress.<br><br>We believe that empowering employees helps the organization in harnessing individual talents to the fullest. We emphasize on building team spirit which helps employees to realize collective potential. If you are looking for a workplace that can prepare you to take up challenges in life, a career with us offers a lifetime of learning.<br><br>Submit your Resume to shanmugaraj@arunpla.com for review so that you can be notified of future possibilities that match your skills and interests.</p>
                </header>            
            </div>      
        </section><!-- #about --> 
        <section id="contact" class="section-bg wow fadeInUp">   
            <div class="container">               
                <div class="section-header">    
                    <h3>Career Form</h3>  
                </div>                
                <div class="form">  
                    <div id="sendmessage">Your message has been sent. Thank you!</div> 
                    <div id="errormessage"></div>  
                    <form action="career.php" method="post" role="form" class="contactForm">   
                        <div class="form-row">                   
                            <div class="form-group col-md-6">  
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter your name" /> 
                                <div class="validation"></div>     
                            </div>                     
                        </div>                       
                        <div class="form-row">    
                            <div class="form-group col-md-6"> 
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />    
                                <div class="validation"></div>     
                            </div>                      
                        </div>                      
                        <div class="form-row">      
                            <div class="form-group col-md-6">    
                                <input type="radio" checked="checked" name="radio">&nbsp; Male &nbsp;     
                                <input type="radio" name="radio"> &nbsp; Female &nbsp;          
                            </div>                     
                        </div>                       
                        <div class="form-row">    
                            <div class="form-group col-md-6">    
                                <input type="text/number" class="form-control" name="phone" id="phone" placeholder="Phone Number" data-rule="minlen:4" data-msg="Please enter valid your contact number" />   
                                <div class="validation"></div>  
                            </div>             
                        </div>               
                        <div class="form-row">  
                            <div class="form-group col-md-6"> Country : &nbsp;        
                                <select name="country">                        
                                    <option value="india">India</option>   
                                    <option value="indonesia">Indonesia</option>    
                                </select>                          
                                <div class="validation"></div>  
                            </div>                 
                        </div>                    
                        <div class="form-row">    
                            <div class="form-group col-md-6">  
                                State : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
                                <select name="state">            
                                    <option value="chennai">Chennai</option>  
                                    <option value="hyderapad">Hyderapad</option>  
                                </select>                           
                                <div class="validation"></div>             
                            </div>                   
                        </div>                    
                        <div class="form-row">              
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="qualification" id="qualification" placeholder="Qualification" data-rule="minlen:4" data-msg="Please enter valid Qualification" />   
                                <div class="validation"></div>   
                            </div>         
                        </div>                 
                        <div class="form-row">  
                            <div class="form-group col-md-6">       
                                <input type="text" class="form-control" name="keyskills" id="keyskills" placeholder="Key Skills" data-rule="minlen:4" data-msg="Please enter key skills" />       
                                <div class="validation"></div>  
                            </div>                   
                        </div>                
                        <div class="form-row">     
                            <div class="form-group col-md-6">         
                                <input type="text" class="form-control" name="experience" id="experience" placeholder="Experience" data-rule="minlen:4" data-msg="Please enter your experience" />    
                                <div class="validation"></div>    
                            </div>                   
                        </div>                    
                        <div class="form-row">    
                            <div class="form-group col-md-6">    
                                <input type="text" class="form-control" name="position_applying" id="position_applying" placeholder="Position for applying" data-rule="minlen:4" data-msg="Please enter Position for applying" /> 
                                <div class="validation"></div>  
                            </div>          
                        </div>               
                        <div class="form-row">     
                            <div class="form-group col-md-6">   
                                <label>Attach your Resume : </label>     
                                <input type="file" name="pic" id="pic">    
                                <div class="validation"></div>    
                            </div>                     
                        </div>                      
                        <div class="g-recaptcha" data-sitekey="6Le5H38UAAAAAILzLXWMUhhtumW8Jg0m5Wvt4BCr"></div>        
                        <!-- secret key (6LfBw3YUAAAAAIxduK6ndPv_YvzKEIHNgC3ZwWGW) -->     
                        <div class="text-center"><button type="submit">Send Message</button></div> 
                    </form>              
                </div>           
            </div>      
        </section><!-- #contact --> 
<?php include 'footer.php' ?>   
    </body>
</html>