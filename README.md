# IPP 1.1 PHP Implementation: PIPP

## Why PHP for IPP?
IPP uses HTTP as a transport layer, and therefor PHP makes decent sense to be a candidate for protocol implementation. IPP requests are essentially an HTTP request with a binary encoded body called the Operations Layer.

### But isn't PHP really slow? Especially compared to CUPS which is C++!
Well, first of all, [PHP is faster than ever](http://www.zend.com/en/resources/php7_infographic). Second of all, the amount of time difference we are talking here matters very little to the domain of printers, which are have common performance expectations of several magnitudes slower than any speed improvements you'd gain from C++.

Regardless, more than one (CUPS) system for more complicated virtual printers that is really easy to write against is a great thing.
And on the client side, there really is no option for direct from webserver IPP printing.

## What
IPP 1.1 is defined by two RFCs:

- RFC 2910 deals with data models and encoding in the Operations Layer, and is covered by the IPP\Encoding namespace. It is how to take the binary payload in an HTTP request and interpret it (or write it).

- RFC 2911 discusses the attributes various operations require/have optionally and how to handle them. It is much larger in scope, and is represented by everything except the \IPP\Encoding namespace.

## When/How

Project road map:
1. ~~Write encoding models.~~
2. ~~Write encoding (de)serializers.~~
3. Prove Encoding works with unit tests based on examples provided at in Appendix A of RFC2910.
4. Writing operation data models in IPP\Operation for all required operations.
5. Write printer and job data class code.
6. Write translation code between \IPP\Encoding and \IPP\Operation and Job and Printer models.
7. Test Translation code against requirements based on RFC2911 and examples from 2910.
8. Write IPP test Printer that fakes basic responses to clients - unit test
    - This Will require stubbing out the printer code with abstracts for actual implementers
9. Write IPP test client that and triggers fake basic interactions with printer - unit test
    - This Will require stubbing out the printer code with abstracts for actual implementers
10. Integration test between 8 and 9.
11. ...?
12. ~~Collect internet points.~~

Extras:
- PSR7 translation layer
- HTTP Printer that returns successful and submits request as json to a url
- A local printer driver implementation

## Who
https://github.com/johnvandeweghe
