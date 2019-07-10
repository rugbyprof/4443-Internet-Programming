## Terms - Collection of relevant terms
#### Due: NA

### General Idea

The internet in general based on a network model called the client-server model. 

<img src="http://cs.mwsu.edu/~griffin/zcloud/zcloud-files/Client-Server.jpg">

Where:
- **`Client`** A term used to identify the computer being used by an individual accessing / requesting a web resource (web page, data, image, etc.)
- **`Server`** A term used to identify the computer being accessed via some network connection that is continuously waiting (listening) for incoming requests. Typically server requests dealing with web (internet) are handled on port `80` for `HTTP` or `443` for `HTTPS`

There are other network models as well (like peer-to-peer), but when the term `internet programming` is used, we tend to think web pages and servers. Another way of looking at the `client-server` model is as a `front-end / backend` set up where:
- **`Front-End `** - Anything sent to the client to be **run in the browser**. This could be HTML, Javascript, images, videos, etc. This mostly deals with the presentation of information and handling user requests (like a clicked link).
- **`Back-End`** - Any code running on a server waiting to respond to user requests (aka server side scripts). This could be any programming language, but some typical languages would be `Node`, `PHP` or even `Python`.


### Protocols
- **`FTP`** File Transfer Protocol. A method of transferring files between two computers without an encryption layer. Usually associated with port 21.
- **`SFTP`** Same as FTP but adds an encryption layer for security. Usually associated with port 22.
- **`HTTP`** defines a set of request methods to indicate the desired action to be performed for a given resource. Although they can also be nouns, these request methods are sometimes referred as `HTTP` verbs. Each of them implements a different semantic, but some common features are shared by a group of them: e.g. a request method can be safe, idempotent, or cacheable.
- **`TCP`**  Transmission Control Protocol. Used primarily with `IP` (Internet Protocol). TCP provides reliable, ordered, and error-checked delivery of a stream of octets (bytes) between applications running on hosts communicating via an IP network [[8](#references)]. In english it means TCP takes resources (like a web page), and breaks them into packets sending each packet individually out onto the network which use routers (and the IP protocol) to deliver the packets to the destination. The TCP protocol then re-assembles into the orignal resource. 
- **`IP`** - Internet Protocol [[9](#references)] This protocol is used primarily with the TCP protocol. Where TCP breaks messages into packets, the IP protocol is what network hardware uses to determine exactly where to send the packet so it arrives at its destination.
- **`SSH`** - The SSH protocol (also referred to as Secure Shell) is a method for secure remote login from one computer to another. It provides several alternative options for strong authentication, and it protects the communications security and integrity with strong encryption[[12](#references)]

### More Terms

- **`PORT`** - A port number is a 16-bit unsigned integer, thus ranging from 0 to 65535 and accompainies some type of server request. For example when a user goes to `http://google.com` most likely this request will be "served" (answered) on port 80 [[7](#references)].
- **`Typical Port Assignments`**
  - 21: File Transfer Protocol (FTP)
  - 22: Secure Shell (SSH) Secure Login
  - 25: Simple Mail Transfer Protocol (SMTP) E-mail routing
  - 53: Domain Name System (DNS) service
  - 80: Hypertext Transfer Protocol (HTTP) used in the World Wide Web
  - 110: Post Office Protocol (POP3)
  - 123: Network Time Protocol (NTP)
  - 143: Internet Message Access Protocol (IMAP) Management of digital mail
  - 194: Internet Relay Chat (IRC)
  - 443: HTTP Secure (HTTPS) HTTP over TLS/SSL

- **`IP Address`** - [[14](#references)]
  - An IP address (short for Internet Protocol address) is used to identify computers on the Internet. It works like a return address would on a piece of mail.
  - Each packet in the TCP/IP protocol contains a copy of the destination and return IP address.
  - Your IP address is usually based on a real-world location. Google might use your IP address to guess where you are and give you local results.
  - Your IP address will be a number, like `172.16.254.1` or `2001:db8:0:1234:0:567:8:1`.
- **`Domain Name`** - A plaintext name listed on DNS servers with an associated IP address. We need domain names because humans suck at remembering long numbers. For example the domain name `google.com` has an associated IP address of `172.217.9.174`
- **`URI`** Uniform Resource Identifier
  - Assigns an address to some resource 
  - `URI` = `URL` + `URN`
- **`URL`** Uniform Resource Locator
  - The how and the where
  - `[scheme]://[domain]:[port]/[path]?[query string]#fragment_id`
- **`URN`** Uniform Resource Name
  - The name of a resource
- **`JSON`** - Javascript Object Notation 
- **`API`** - Application Programmers Interface
- **`HTTP Methods`** [[2](#references)]
  - **`GET`** - requests are the most common and widely used methods in APIs and websites. Simply put, the GET method is used to retreive data from a server at the specified resource.
  - **`POST`** - requests are used to send data to the API sever to create or udpate a resource. The data sent to the server is stored in the request body of the HTTP request.
  - **`PUT`** - Simlar to POST, PUT requests are used to send data to the API to create or update a resource. The difference is that PUT requests are idempotent. That is, calling the same PUT request multiple times will always produce the same result. In contrast, calling a POST request repeatedly make have side effects of creating the same resource multiple times.
  - **`HEAD`** - The HEAD method asks for a response identical to that of a GET request, but without the response body.
  - **`DELETE`** - This method is exactly as it sounds: delete the resource at the specified URL.
  - **`PATCH`** - This request method applies partial modifications to a resource.
  - **`OPTIONS`** - The OPTIONS method is used to describe the communication options for the target resource. 
- **`Idempotent Methods`** [[3](#references)] The term idempotent is used more comprehensively to describe an operation that will produce the same results if executed once or multiple times. This is a very useful property in many situations, as it means that an operation can be repeated or retried as often as necessary without causing unintended effects. With non-idempotent operations, the algorithm may have to keep track of whether the operation was already performed or not.



 
### References <a name="references" id="references"></a> 

1. https://assertible.com/blog/7-http-methods-every-web-developer-should-know-and-how-to-test-them
2. https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/
3. https://restfulapi.net/http-methods/
5. https://en.wikipedia.org/wiki/Front_and_back_ends
6. https://en.wikipedia.org/wiki/Client%E2%80%93server_model
7. https://en.wikipedia.org/wiki/Port_(computer_networking)
8. https://en.wikipedia.org/wiki/Transmission_Control_Protocol
9. https://en.wikipedia.org/wiki/Internet_Protocol
10. https://en.wikipedia.org/wiki/IP_address
11. https://techdifferences.com/difference-between-client-server-and-peer-to-peer-network.html
12. https://www.ssh.com/ssh/protocol/
14. https://support.google.com/websearch/answer/1696588