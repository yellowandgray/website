<!doctype html>
<html lang="en">
    <?php
    $page = 'home';
    include 'head.php';
    ?>
    <body>
        <div class="wrapper">
            <!--Header Start-->
            <?php include 'menu.php'; ?>
            <div id="search">
                <button type="button" class="close">×</button>
                <form class="search-overlay-form">
                    <input type="search" value="" placeholder="type keyword(s) here" />
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <!--Header End-->
            <!--Inner Header Start-->
            <section class="wf100 p100 inner-header" style="background: url(images/renewable-energy/Untitled-2.jpg) no-repeat;">
                <div class="container">
                    <h1>Renewable Energy</h1>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#"> Products </a></li>
                        <li><a href="#">Renewable Energy</a></li>
                    </ul>
                </div>
            </section>
            <!--Inner Header End--> 

            <section class="wf100 p80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'dc-dc')" id="defaultOpen">Dc Junction Boxes</button>
                                <button class="tablinks" onclick="openCity(event, 'data-logger')">Data Logger</button>
                                <button class="tablinks" onclick="openCity(event, 'dc-dc converter')">Dc-Dc converter</button>
                                <button class="tablinks" onclick="openCity(event, 'hot_moulded')">Hot Moulded</button>
                                <button class="tablinks" onclick="openCity(event, 'photo_voltaic')">Photo voltaic</button>
                                <button class="tablinks" onclick="openCity(event, 'string_card')">String Card</button>
                                <button class="tablinks" onclick="openCity(event, 'wire_less')">Wire Less</button>
                            </div>
                        </div>

                        <div id="dc-dc" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>DC JUNCTION BOXES PHOTOVOLTAIC(DCBJ)1050-1500 VDC</h3><br>
                                                <h4>Coffrets de jonction continu Photovoltaiques(DCBJ)1050-1500 VDC</h4><br>
                                                <h5>Equipment for gathering the strings of solar panels and to protect the links to the inverter.</h5>
                                                <span>These junction boxes provide 15A –30A fuse protection. The passage of the strings is carried out using Photovoltaic connectors of (a pair of female and male connectors accompanies the requirement). The connection to the inverter is provided for a 2x120 sqmm² cable up to 10 strings, and beyond for two 300 sqmm² cables.</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/dc-converter.jpg" alt=""/>  
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="img-1 renewable-energy text-center">
                                                <div>
                                                    <img src="images/renewable-energy/confirms.png" alt=""/>
                                                </div>
                                                <div>
                                                    <h5>CONFIRMS</h5>
                                                    <span>IEC 61439-1,NF C 15-100,NF EN 61439-1, NF EN 50521, NF EN 61643-11, NF EN 60269, UTE C32-502</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="img-1 renewable-energy text-center">
                                                <img src="images/renewable-energy/resistant.png" alt="" />
                                                <h5>WEATHER RESISTANT</h5>
                                                <span>Armored polyester box with Fiberglass, resistant to harsh weather and UV</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="img-1 renewable-energy text-center">
                                                <img src="images/renewable-energy/degree.png" alt="" />
                                                <h5>DEGREE OF PROTECTION </h5>
                                                <span>IP 66 (IP55 large format) & IK 10</span></div>
                                        </div>
                                    </div><br>
                                </div>
                            </section>
                        </div>
                        <div id="data-logger" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>DATA LOGGER</h3><br>
                                                <h4>S-Log(Monitoring and controlling with AI) </h4>
                                                <span>S-LOG is one of the leading devices for solar monitoring,feed-in management and IoT based solutions for solar power plants.We have developed the S-LOG devices and solutions which make a remarkable contribution to the successful integration of solar energy into an intelligent power and help to make a successful transition to clean energy.S-LOG is a monitoring and controlling platform with AI for solar power plants that focuses to cut maintenance costs with real-time fault monitoring and by using detailed operational intelligence to improve day-to-day effectiveness and planning.We maximize power production and quantify energy savings by identifying under performance systems,hence allowing customers and companies to manage their product life cycle.our intelligence controlling systems maximize the consumption of self-produced power.Inspective and corrective algorithms enable perfect and precise data acquisition and logging to avoid erroneous data.Our believed domain and focus is on renewable energy and energy efficiencies.</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <br>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/S-LOG.jpg" alt="" />  
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>ATTRIBUTES</h3><br>
                                                <ul>
                                                    <li>Innovative solar monitoring to maximize ROI.</li>
                                                    <li>Real time monitoring and alerts reduce downtime and losses.</li>
                                                    <li>Easy O & M and Asset management - Identifies under-performing assets and their impact with preventive and corrective maintenance tool.</li>
                                                    <li>Root cause analysis of energy loss</li>
                                                    <li>Dashboards for easy visualization.</li>
                                                    <li>Retrofit for any MODBUS network(RS485/RS232)</li>
                                                    <li>Cutting edge technology with domain expertise.</li>
                                                    <li>Compatibility with maximum devices on all network and protocols.</li>
                                                    <li>Customized and effective end to end solutions.</li>
                                                    <li>Effective and to the point solutions</li>
                                                    <li>Steer the future with innovations in solar.</li>
                                                    <li>Informative and convincing data analysis</li>
                                                    <li>Avoid erroneous data</li>
                                                    <li>Measure acquire analyze innovate.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>UNIQUE FEATURES</h3><br>
                                                <ul>
                                                    <li>Expert control till net metering.</li>
                                                    <li>Variants and types of devices as per applications.</li>
                                                    <li>Competitive in cost for small residential and commercial systems</li>
                                                    <li>Real time monitoring - 1min logs</li>
                                                    <li>Grid and DG side monitoring and comparison with solar</li>
                                                    <li>Load monitoring.</li>
                                                    <li>PR-daily,weekly,monthly,yearly and also PR-YTD.</li>
                                                    <li>Expected and actual generation comparison.</li>
                                                    <li>Alert System - mails and messages</li>
                                                    <li>Local data storage and upload to portal in case of internet failure.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="dc-dc converter" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>DC-DC CONVERTER</h3><br>
                                                <h4>I CONTROL-IN-PV -LDC-</h4>
                                                <span>Specifically designed for Renewable applications to cater variable input voltage range of 170-1000VDC maintaining high efficiency and reliability in its class. The L series brings with itself facility to sustain Low Voltage lockouts, specifically in solar installations. This facility avoids frequent flickering in fields during Low Voltage Conditions and can provide a stable output throughout on full load.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/dc-dc.jpg" alt="" /> 
                                            <h5>DC-DC Converter with low voltage lockout facility with input voltage range (170 VDC to 1000 VDC).</h5>

                                        </div>
                                    </div><br><br>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>BENEFITS OF THE RANGE</h3><br>
                                                <ul>
                                                    <li>Designed to cater for renewable energy application</li>
                                                    <li>Wide input voltage range:170VDC to 1000VDC.</li>
                                                    <li>Industrial grade operating temperature: -10 degree celsius to +80 degree celsius.</li>
                                                    <li>Isolation voltage up to 4.5KVAC.</li>
                                                    <li>Efficiency upto 90%.</li>
                                                    <li>Low voltage lockout</li>
                                                    <li>Low ripple,Low noise.</li>
                                                    <li>Inbuilt protections like reverse input voltage protection,output short circuit,over-voltage protection.</li>
                                                    <li>High reliability and long life.</li>
                                                    <li>DIN-Rail mounting.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>I CONTROL-IN-PV - DC-DC Converter</h3><br>
                                                <span>Specifically designed for Renewable applications to cater the most variable input voltage range of 100-1000VDC maintaining high efficiency and reliability in its class under variable environmental conditions. It can be used in a variety of application like SMBs (String Monitoring Boxes), Solar water pumps, Solar trackers, High voltage inverters and many more to achieve stable and reliable output voltage.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/dc-dc-converter2.jpg" alt="" /> 
                                            <h5>DC-DC Converter with maximum efficiency and wide input voltage range (100 VDC to 1000 VDC).</h5>

                                        </div>
                                    </div><br><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>BENEFITS OF THE RANGE</h3><br>
                                                <ul>
                                                    <li>Designed to cater for Renewable energy applications.</li>
                                                    <li>Wide Input voltage range:100VDC to 1000VDC.</li>
                                                    <li>Industrial grade operating temperature: -10 degree celsius to +80 degree celsius.</li>
                                                    <li>High isolation voltage up to 4.5KVAC.</li>
                                                    <li>High efficiency in its class-up to 90%.</li>
                                                    <li>Low ripple,Low noise</li>
                                                    <li>Inbuilt protections like reverse input voltage protection,Output short circuit protection,Over-voltage protection.</li>
                                                    <li>High reliability and long life.</li>
                                                    <li>Mounting flexibility:PCB mounting,DIN-Rail mounting.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>I CONTROL-IN-PV - DC-DC Converter</h3><br>
                                                <span>Specifically designed for Renewable applications to cater the most variable input voltage range of 200-1500VDC maintaining high efficiency and reliability in its class under variable environmental conditions. It can be used in a variety of application like SMBs (String Monitoring Boxes), Solar water pumps, Solar trackers, High voltage inverters and many more to achieve stable and reliable output voltage.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/dc-dc-converter3.jpg" alt="" /> 
                                            <h5>DC-DC Converter with maximum efficiency and wide input voltage range (200 VDC to 1500 VDC).</h5>
                                        </div>
                                    </div><br><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>BENEFITS OF THE RANGE</h3><br>
                                                <ul>
                                                    <li>Designed to cater for Renewable energy applications.</li>
                                                    <li>Wide Input voltage range:100VDC to 1000VDC.</li>
                                                    <li>Industrial grade operating temperature: -10 degree celsius to +80 degree celsius.</li>
                                                    <li>High isolation voltage up to 4.5KVAC.</li>
                                                    <li>High efficiency in its class-up to 86%.</li>
                                                    <li>Low ripple,Low noise</li>
                                                    <li>Inbuilt protections like reverse input voltage protection,Output short circuit protection,Over-voltage protection.</li>
                                                    <li>High reliability and long life.</li>
                                                    <li>Mounting flexibility:DIN-Rail mounting.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </section>
                        </div> 
                        <div id="hot_moulded" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>HOT MOULDED GRP(Minipol,Maxipol & Combister)</h3><br>
                                                <h4>MINIPOL System</h4>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/minipol.jpg" alt="" />
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>MAXIPOL System</h3><br>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/maxipol.jpg" alt="" />
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>COMBISTER System</h3><br>
                                                <h4>MODULAR POLYSTER BOXES(90MM)</h4>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/combister.png" alt="" />
                                        </div>
                                    </div><br>
                                </div>
                            </section>
                        </div>
                        <div id="photo_voltaic" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>PHOTOVOLTAIC CONNECTORS AND JUNCTION BOXES</h3><br>
                                                <h4>Photovoltaic Connectors(CSC)</h4>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <span>Photovoltaic connectors used to connect strings of panels to be easily constructed by pushing the connectors from adjacent panels together by hand,with a range of 2.5 sq.mm - 6 sq.mm cables.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/approval.jpg"  alt="" /><span>Approvals in accordance to IEC 62852:2014</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/voltage.jpg"  alt="" /><span>Voltage 1000 VDC 1500 VDC (TUV)</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/resistant.jpg"  alt="" /><span>Resistant to weather conditions (IP 68)</span>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/safety.jpg"  alt="" /><span>Safety class II</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/uv.jpg"  alt="" /><span>UV protected</span>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/lock.jpg"  alt="" /><span>Locking device NEC 2014</span>
                                            </div>
                                        </div>
                                    </div><br><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>PLUG IN CONNECTOR</h3><br>
                                                <span>Plug in Connector are single-contact electrical connectors commonly used for connecting solar panels. It allow strings of panels to be easily constructed by pushing the connectors from adjacent panels together by hand, but require a tool to disconnect them to ensure they do not accidentally disconnect when the cables are pulled.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/plug-in.jpg" alt="" />
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>PANEL CONNECTOR</h3><br>
                                                <span>Panel Connector are single-contact electrical connectors commonly used for connecting solar panels with combiner boxes. It allow strings of panels to be easily connected to combiner box by pushing the connectors from panels together by hand, but require a tool to disconnect them to ensure they do not accidentally disconnect when the cables are pulled</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/panel.jpg" alt="" />
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>BRANCH CONNECTORS (MALE & FEMALE)</h3><br>
                                                <span>Branch connector are developed to facilitate parallel connections of male or female straight connectors depending on on-site applications. The branch connector has three branches, two for inputs either male or female and one for output either male or female. The branch connector is easy to connect and disconnect, thus it is easy to use.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="images/renewable-energy/branch-connectors1.jpg" alt="" />
                                        </div>

                                        <div class="col-md-6">
                                            <img src="images/renewable-energy/branch-connectors2.jpg" alt="" />
                                        </div>
                                    </div><br>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>Photovoltaic Module Junction Boxes (CJB)</h3><br>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <span>The junction box is an enclosure on the module where the PV strings are electrically connected, with a range of 2.5 sq.mm - 6 sq.mm cables.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/approval.jpg"  alt="" /><span>Approvals in accordance to IEC 62790:2014</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/voltage.jpg"  alt="" /><span>Voltage 1000 VDC 1500 VDC (TUV)</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/resistant.jpg"  alt="" /><span>Resistant to weather conditions (IP 68)</span>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/safety.jpg"  alt="" /><span>Safety class II</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/non-hygroscopic.jpg"  alt="" /><span>Non hygroscopic</span>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/connection.jpg"  alt="" /><span>Connection alternatives(1.soldering 2.clamping)</span>
                                            </div>
                                        </div>
                                    </div><br><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>MODULE JUNCTION BOXES</h3><br>
                                                <span>Photovoltaic junction boxes provide the first interface to the power from solar module towards the grid. A junction box with its bypass diodes keeps the power flow unilateral preventing any reverse feed in low light situations.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/module.jpg" alt="" />
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>POSSIBILITIES PV FIELD INSTALLATIONS</h3><br>
                                                <span>This example shows a CSC plug in connector system 1 with a CJB 2 rail Junction Box 2 in association with a CSC branch connector system 3 and feed through to a solar combiner box 6 with CSC panel connector system 4 .</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/possibilities.jpg" alt="" />
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <span>This second example shows a CJB 4 Rail Junction Box 5 with a CSC Plug in connector.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="images/renewable-energy/possibilities1.jpg" alt="" />
                                        </div>
                                    </div>
                                </div><br>
                            </section>       
                        </div>
                        <div id="string_card" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>STRING CARD</h3><br>
                                                <h5>STRING MONITORING CARDS WITH GREATER ACCURACY AND RELIABLE DATA TRANSFER</h5><br>
                                                <h6>Unique features of data buffering AVOIDING DATA LOSSES and additional wireless devices(CSC)</h6>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/string1.jpg"  alt="" class="img-responsive"/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="renewable-energy">
                                                <img src="images/renewable-energy/string2.jpg"  alt="" class="img-responsive"/>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>FEATURES</h3><br>
                                                <ul>
                                                    <li>Range - 8/12/16/24 input channels for current.</li>
                                                    <li>1 input channel for voltage -1000V or 1500V.</li>
                                                    <li>1 on board temperature sensor.</li>
                                                    <li>2 input channels for temperature.(PT100)</li>
                                                    <li>4 digital inputs</li>
                                                    <li>RS 485 MODBUS/Wireless interface.</li>
                                                    <li>Stud or screw mounting.</li>
                                                    <li>Wireless option available - Low power long range and reliable data transfer</li>
                                                    <li>Shunt based monitoring increases accuracy.</li>
                                                    <li>Very low power consumption <3W.</li>
                                                    <li>Robust and reliable.</li>
                                                    <li>Calculated DC Power,alarms,status etc.can be monitored by using Modbus.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>GENERAL SCHEMATIC FOR STRING MONITORING</h3>
                                            </div>
                                        </div>
                                    </div><br>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <span>String monitoring in solar power plant has become a useful tool to dig inside for fault analysis and diagnosis.Also string current and voltage monitoring in real time reduces the failure time and efficiency of O & M team.overvoltage and fuse blown alarm indicates and SPD,breaker status can be interfaced and monitored through SCADA by using Modbus.As SMB helps to increase the performance of solar power plant, reliable data transfer is very crucial. We are buffering the data if communication link is failed and transferring again once link is established. This enables us to avoid data loss. Our wireless solution is also unique where we are using low power, long range modules with proprietary transmission mechanism. </span>
                                            </div><br>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="renewable-energy" style="text-align: -webkit-center;">
                                                <img src="images/renewable-energy/schematic.jpg"  alt="" class="img-responsive"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="wire_less" class="tabcontent">
                            <section class="wf100 p80">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>WIRELESS TRANSCEIVER MODULE</h3>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>Product Description</h3>
                                                <span>Low-Power consumption and long range LoRa Technology transceiver module provides an easy to use wireless data transfer. The advanced command interface offers rapid time to market. It integrates RF, a baseband controller, command application, programming interface (API) processor, making it a complete long range solution. This module is suitable for simple long range sensor and wireless applications with an external host MCU.
                                                    LoRa Technology RF modulation provides long range spread spectrum communication with high interference immunity. Using LoRa Technology modulation technique, it can achieve a receiver sensitivity of -146 dBm
                                                    The high sensitivity combined with the integrated +18.5 dBm output power amplifier yields industry leading link budget, which makes it optimal for applications requiring extended range and robustness.
                                                    LoRa Technology modulation also provides significant advantages in both blocking and selectivity compared to the conventional modulation techniques, solving the traditional design compromise between extended range, interference immunity, and low-power consumption.</span>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <h3>Applications</h3>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="renewable-energy">
                                                <h5>Teritary</h5>
                                                <img src="images/renewable-energy/tertiary.jpg"  alt="" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="renewable-energy">
                                                <h5>Industry</h5>
                                                <img src="images/renewable-energy/industry.jpg"  alt="" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="renewable-energy">
                                                <h5>Energy storage</h5>
                                                <img src="images/renewable-energy/energy-storage.jpg"  alt="" />
                                            </div>
                                        </div>

                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="renewable-energy">
                                                <h5>Transport</h5>
                                                <img src="images/renewable-energy/transport.jpg"  alt="" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="renewable-energy">
                                                <h5>Renewable energies</h5>
                                                <img src="images/renewable-energy/renewable-energies.jpg"  alt="" />
                                            </div>
                                        </div>

                                    </div><br>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="renewable-energy">
                                                <ul>
                                                    <li>Solar- Trackers, SMB(String monitoring box),Data loggers,SCADA etc.</li>
                                                    <li>Building and Home Automation.</li>
                                                    <li>Wireless Alarm and security systems</li>
                                                    <li>Industrial monitoring and control</li>
                                                    <li>Machine to Machine(M2M).</li>
                                                    <li>Internet of things(IOT).</li>
                                                    <li>Smart Metering.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </section>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>

<!--Causes End--> 

<!--Partner Logos Section End--> 
<?php include'footer.php'; ?>
<script type="text/javascript">
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 