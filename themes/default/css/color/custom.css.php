/* custom template */

body {
  background-color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}

a{
  color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}

a:hover,a:active{
  color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}

.info-bar-button{
  color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}

.info-bar-button:hover,.info-bar-button:active{
  color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
  text-decoration: underline;
}

.dir-bar-button{
  background-color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}

.dir-items{
  background-color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}

.dir-bar,.info-bar{
  background-color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}


a.dir-bar-button:hover,a.dir-bar-button:active{
  background-color:<?php $_lai->css->print_property($default,$name,$prop); ?>;
}


