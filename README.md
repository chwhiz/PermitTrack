# ww's permit checker

230527

this is a simple permit checker made out of PHP that I made to make permit checking more easier.
i made this while I'm bored lol
the site is in https://www.devirent.com/permit but it requires login to access lol

## Setup

Change line 87's url.


You can do whatever you want in the code. If you want to do some experiments then go for it :))

## Usage
To use the Permit Checker, put the permit number in the field and submit. it will send a post request to the permit site you have entered and gets the content. then it will filter the uneccessary tags and show the name.

## Contributing
If you would like to contribute, please fork this repository and submit a pull request. All contributions are welcome!


## FAQs

#### Q: I get a file_get_contents() error when I try to use the permit lookup.
A: This is most likely because you didn't configured your php.ini to enable the openssl extension. To fix this, open your php.ini file and uncomment the line `;extension=openssl` by removing the semicolon. It should look like this:
```php
extension=openssl
```


## License
ww's permit checker is licensed under the MIT License. See the LICENSE file for more information.

Thank you!!

- wonwoonieeee
