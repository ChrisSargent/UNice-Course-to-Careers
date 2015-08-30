<?php

class footer{
    
    public function __construct() {
        ;
    }
    
    public function footer(){
        return <<<footer
<footer class="container-">
<div style="height:150px;"></div>

                                                    <div class="credits">
                                                        <strong>www.unice.fr<br />Université Nice Sophia Antipolis</strong><br /><ul class="list-inline"><li><a href="/sitemap">Plan du site</a></li>
                                                            <li><a href="/accessibility-info">Accessibilité</a></li>
                                                            <li><a href="/contact-info">Contact</a></li>
                                                        </ul></div>
                                                </footer>
                                                
                                                <script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/bootstrap.min.js"></script>
                                                <!--<script src="assets/js/holder.js"></script>-->
                                                <script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.easing.1.3.js"></script>
<script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.fitvids.js"></script>
<script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/jquery.bxslider.min.js"></script>
<script src="/++theme++ThemeUNS/++resource++unice.theme.javascripts/libs/twitter-bootstrap-hover-dropdown.min.js"></script>


</body></html>        
footer;
    }
}

?>
