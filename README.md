# Product API Package

This Laravel project integrates with an external product API package. Follow the steps below to set up and run the project.

## Requirements

- PHP 8.2 or higher
- Composer

## Installation

### Step 1: Add the Repository

Open your `composer.json` file and add the following under the `repositories` section:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:alionurr/product_api_package.git"
    }
]
```

### Step 2: Install the Package

Run the following command to require the package:

```bash
composer require product/product-api:dev-master
```

### Step 3: Configure Environment Variables

Open your `.env` file and add the following configuration settings:

```env
AMAZON_BASE_URI=https://real-time-amazon-data.p.rapidapi.com
AMAZON_API_KEY=a2addd42e6msh4efa76b442b9039p1236b5jsn43246da62782
AMAZON_HOST=real-time-amazon-data.p.rapidapi.com
EBAY_BASE_URI=https://real-time-product-search.p.rapidapi.com
EBAY_API_KEY=a2addd42e6msh4efa76b442b9039p1236b5jsn43246da62782
EBAY_HOST=real-time-product-search.p.rapidapi.com
```

## Usage

After completing the above steps, your Laravel project should be able to use the Product API package.

## Notes

- This project requires PHP 8.2 or higher.
- Ensure you have the necessary permissions to access the repository specified in the `composer.json` file.

## License

This project is licensed under the MIT License.

