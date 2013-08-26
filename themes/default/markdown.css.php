<?php
header("Content-type: text/css");

 ?>

.markdown-wrapper{
  width:100%;
  min-width: 400px;
  margin:45px 0;
}

.markdown-content{
  width:90%;
  padding: 3em;
  border-radius: 0.7em;
  margin: 0 auto;
  border: solid 2.5px #aaa;
  font-size: 0.92em;
  background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPScyNzknIGhlaWdodD0nMjc5JyB2aWV3Qm94PScwIDAgMjc5IDI3OSc+Cgk8ZGVmcz4KCQk8cGF0dGVybiBpZD0nYmx1ZXN0cmlwZScgcGF0dGVyblVuaXRzPSd1c2VyU3BhY2VPblVzZScgeD0nMCcgeT0nMCcgd2lkdGg9JzMxJyBoZWlnaHQ9JzMxJyB2aWV3Qm94PScwIDAgNjIgNjInID4KCQk8cmVjdCB3aWR0aD0nMTEwJScgaGVpZ2h0PScxMTAlJyBmaWxsPScjZmZmZmZmJy8+CgkJCTxwYXRoIGQ9J00xLDFoNjJ2NjJoLTYydi02MicgZmlsbC1vcGFjaXR5PScwJyBzdHJva2Utd2lkdGg9JzEnIHN0cm9rZS1kYXNoYXJyYXk9JzAsMSwxJyBzdHJva2U9JyNlYWVhZWEnLz4KCQk8L3BhdHRlcm4+IAoJCTxmaWx0ZXIgaWQ9J2Z1enonIHg9JzAnIHk9JzAnPgoJCQk8ZmVUdXJidWxlbmNlIHR5cGU9J3R1cmJ1bGVuY2UnIHJlc3VsdD0ndCcgYmFzZUZyZXF1ZW5jeT0nLjIgLjMnIG51bU9jdGF2ZXM9JzUnIHN0aXRjaFRpbGVzPSdzdGl0Y2gnLz4KCQkJPGZlQ29sb3JNYXRyaXggdHlwZT0nc2F0dXJhdGUnIGluPSd0JyB2YWx1ZXM9JzAnLz4KCQk8L2ZpbHRlcj4KCTwvZGVmcz4KCTxyZWN0IHdpZHRoPScxMDAlJyBoZWlnaHQ9JzEwMCUnIGZpbGw9J3VybCgjYmx1ZXN0cmlwZSknLz4KPHJlY3Qgd2lkdGg9JzEwMCUnIGhlaWdodD0nMTAwJScgZmlsdGVyPSd1cmwoI2Z1enopJyBvcGFjaXR5PScwJy8+Cjwvc3ZnPgo=');
}

.markdown-content p{
  display: block;
  width: 100%;
}
.markdown-code{
  background-color: #fafafa;
  border:solid 1px #ccc;
  border-radius: 3.5px;
  font-size: 0.84em;
  padding: 0.25em 5px;
  line-height: 1.4em !important;
}

.markdown-pre code.markdown-code{
  background: none;
  border:none;
  border-radius: none;
  font-size: 0.93em;
  padding: 0;
}

.markdown-pre{
  background-color: #fff;
  padding: 0.5625em 1.25em 0 1.1875em;
  border-left: 4px solid #dddddd;
  counter-increment: codeBlocks;
}

.markdown-pre code.markdown-code[class*="language-"]:before{
  content: "Unknown Language"; /* default value */
  display: block;
  float:right;
  margin: 0 0 0 0;
  text-align: center;
  color:#ffffff;
  text-align:center;
  font-weight:bold;
  padding:0.2em 0.5em;
  
  text-shadow: /* Simulating Text Stroke */
        -1px -1px 0 #444, 
        1px -1px 0 #444, 
        -1px 1px 0 #444, 
        1px 1px 0 #444;
  
  border: 1px solid rgba(0,0,0,0.3);
  border-bottom: 3px solid rgba(0,0,0,0.3);
  
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  
  background: rgba(0,0,0,0.15);

    -o-box-shadow: 
        0 2px 8px rgba(100,100,100,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);

    -webkit-box-shadow: 
        0 2px 8px rgba(100,100,100,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);

    -moz-box-shadow:
        0 2px 8px rgba(100,100,100,0.5),
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 10px rgba(255,255,255,0.2),
        inset 0 10px 20px rgba(255,255,255,0.25),
        inset 0 -15px 30px rgba(0,0,0,0.3);
  
  box-shadow: 
        0 2px 8px rgba(100,100,100,0.5), /* Exterior Shadow */
        inset 0 1px rgba(255,255,255,0.3), /* Top light Line */
        inset 0 10px rgba(255,255,255,0.2), /* Top Light Shadow */
        inset 0 10px 20px rgba(255,255,255,0.25), /* Sides Light Shadow */
        inset 0 -15px 30px rgba(0,0,0,0.3); /* Dark Background */

  text-decoration: none;
}

.markdown-pre code.markdown-code[class*="language-php"]:before,
.markdown-pre code.markdown-code[class*="language-PHP"]:before{
  content:"PHP";
  background: rgba(0,135,255,0.5);
}

.markdown-pre code.markdown-code[class*="language-html"]:before,
.markdown-pre code.markdown-code[class*="language-HTML"]:before{
  content:"HTML";
  background: rgba(255,135,0,0.5);
}

.markdown-pre code.markdown-code[class*="language-md"]:before,
.markdown-pre code.markdown-code[class*="language-Markdown"]:before,
.markdown-pre code.markdown-code[class*="language-markdown"]:before{
  content:"Markdown";
  background: rgba(150,255,0,0.5);
}

.markdown-img{
  margin: 4px auto;
  display: block;
}





