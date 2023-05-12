#!/Library/Frameworks/Python.framework/Versions/3.11/bin/python3
import cgi

form = cgi.FieldStorage()

name = form.getvalue("buyer_name")
email = form.getvalue("buyer_email")
white = form.getvalue("white")
black = form.getvalue("black")
red = form.getvalue("red")
total_price = int(white) * 10 + int(black) * 20 + int(red) * 30

print("Content-type:text/html\r\n\r\n")

print("<html>")
print("<head>")
print("<title>Receipt</title>")
print("</head>")
print("<body>")
print("<h1>Request for this purchase</h1>")
print("<p>Name: %s</p>" % name)
print("<p>Email: %s</p>" % email)
print("<p>Amount White Karate Gi ($10.00): %s</p>" % str(white))
print("<p>Amount Black Karate Gi ($20.00): %s</p>" % str(black))
print("<p>Amount Red Karate Gi ($30.00): %s</p>" % str(red))
print("<p>Total Amount: $ %s</p>" % str(total_price))
print("<hr>")
print("<p>Please e-transfer this amount to tkc@shop.com<p>")
print("</body>")
print("</html>")
    
