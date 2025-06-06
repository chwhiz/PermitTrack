
# PermitTrack

PermitTrack is a lightweight PHP application designed to ease the process of checking permit statuses.

>[!NOTE]
> This project will be converted into an API.

## Features
- Easy-to-use form for entering permit numbers.
- Sends HTTP POST requests to configured permit websites.
- Processes retrieved HTML content to extract and display relevant data (e.g., names).

## Setup

To get started with PermitTracker:

1. Clone this repository to your local machine.
2. Open the ``permit.php`` file.
3. Locate line ``77``.
```php
 $url = "https://permit.example.com?permitno=" . urlencode($permit_number); // gets the url and adds the permit number.
```

4. Update the URL variable to point to the specific permit lookup API endpoint or website you intend to query.


>[!NOTE]
> This project is open-source, and modifications are welcome.

## Usage
1. Access the application via your web server.
2. Input the permit number into the designated field on the form.
3. Submit the form.

> The application will then send an HTTP POST request to the configured permit website, retrieve the page content, filter out any HTML tags, and display the extracted name information.

## License
PermitTrack is licensed under the [MIT License](https://github.com/chwhiz/permit-checker/blob/main/LICENSE). See the [LICENSE](https://github.com/chwhiz/permit-checker/blob/main/LICENSE) file in the repository for more information.
