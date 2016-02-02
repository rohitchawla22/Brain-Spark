<?xml version="1.0" encoding="ISO-8859-1"?>


<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <title>BrainSpark.</title>
  <style>
  body {background-image:url('images/backg.jpg');repeat:norepeat;}
  .link { border: 1px solid #ffffff;
font-size:40px;
margin-top:50px;
margin-left:auto;
margin-right:auto;
opacity:0.8; 

}
  .flat-button {
  
  position: relative;
  vertical-align: top;
  height: 30px;
  padding: 5px;
  font-size: 14px;
  color:#1C1C1C;
  text-align: center;
  background: #ecf0f1;
  border: 0;
  cursor: pointer;
  
 }
  
  </style>
  <body>

  <center><h2 style="font-size:70px;margin-top:150px;">Webpages</h2></center>
    <table border="1" class="link">
      <tr>
        <th>Links</th>
      
      </tr>
      <xsl:for-each select="pages/link">
      <tr>
      
        <td><xsl:element name="a">
<xsl:attribute name="href">
<xsl:value-of select="url" />
</xsl:attribute>
<xsl:value-of select="title" />
</xsl:element>
 </td>


      </tr>
      </xsl:for-each>
    </table>
	<center><a href="#" onclick="history.go(-1)" style="text-decoration: none; opacity:0.7; font-size:30px;top:50px;position:relative;" class="flat-button">Back</a></center>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>

