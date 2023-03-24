<p align="left" style="background:#000000;">
<a href="https://www.goldfishinternet.com"><img src="https://www.goldfishinternet.com/assets/images/logo/goldfish-interactive-color-logo.png" alt="Goldfish Internet"></a>
</p>

<h1>Goldfish Invoices</h1>

Version: 0.5b

## Topics

1. [Introduction](#introduction)
2. [Requirements](#requirements)
3. [Installation & Configuration](#installation-and-configuration)
4. [Setup and Usage](#setup-and-usage)
5. [License](#license)
6. [Security Vulnerabilities](#security-vulnerabilities)

### Introduction

[Goldfish Invoices](https://www.goldfishinternet.com) is a lightweight invoice web application built with [Laravel](https://laravel.com) and kick started with the very excellent [Quick Admin Panel](https://quickadminpanel.com/)
crud generator. It utilises [LiveWire](https://laravel-livewire.com/) full stack framework and [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/) CSS framework. 

*Demo Laravel Invoice prototype targeted at individuals, freelancers and SMEs.*

Primarily intended to satisfy my own needs as a freelance web developer, I am also using it to gain further real world experience building Laravel and LiveWire full stack web applications.

**This prototype is currently only partially complete but invoicing is functional enough for me to be using in production to create and generate PDF invoices**

Features currently include:

-   Authentication.
-   Admin Dashboard.
-   Client Records.
-   Client Contact Records.
-   Invoice and Invoice Items.
-   PDF Invoice Generator.
-   Invoice Payments.
-   Invoice Notes

### Requirements

-   **SERVER**: Apache 2 or NGINX.
-   **RAM**: 2 GB or higher.
-   **PHP**: 8 or higher.
-   **For MySQL users**: 5.7.23 or higher.
-   **For MariaDB users**: 10.2.7 or Higher.
-   **Node**: 8.11.3 LTS or higher.
-   **Composer**: 1.6.5 or higher.

### Installation and Configuration

I have used Laravel Sail docker setup for development so the .env.example settings can be used to run on your local docker development.

Here is my build and develpment process...

#Modify .env (you can copy the .env.example which is set up for sail development)

#Install PHP dependencies (you will need composer installed)  
composer install

#Install JS dependencies (you will need Node.js and NPM)  
npm install

#Build the SASS and Javascript with Vite
npm run build

#Add an alias for the "sail" command  
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

#Start sail..  
sail up

#Build database structure...  
sail artisan migrate  

#or rebuild database and start over...  
sail artisan migrate:fresh --seed

#run unit/feature tests  
sail artisan test

### Setup and Usage

**Log in as default admin account**  
(please note port 81 which you can remove or adjust in .env with other sail ports)

> _http://localhost:81/login_

```
email:admin@example.com
password:password
```

- Adjust the default email and password using the hamburger menu, under "My Profile".
- You can also modify the full account and add/modify other records in "Settings management"
  and "Users".
- Set up your business details, add logo (png/jpg) in "Settings management" and "Settings". These
  are used on the invoices that get generated. Set your system default payment instructions, tax etc.
- Add your client organisations and optionally add/assign individual client contacts to the client.  
  Set your client default payment instructions, tax etc.
- Create an invoice, add invoice line items, quantity and price. When you are happy you can preview 
  and generate PDF version for emailing using your preferred email client software or service.
- When you receive payments, you can add them to the invoice and once settled the invoice 
  status will update to "Paid".
- You can optionally add invoice notes to further track history.

### License

[Goldfish Invoices](https://github.com/goldfishinternet/goldfish-invoices) is free to use and modify under the [MIT License](https://github.com/krayin/laravel-crm/blob/master/LICENSE). If you use or make use of any files in the repository, I would appreciate credit, stars, positive reviews and links to my website [www.goldfishinternet.com](https://www.goldfishinternet.com]).

### Security Vulnerabilities

Please don't disclose security vulnerabilities publicly. If you find any security vulnerability please email me: [andy@goldfishinternet.com](mailto:andy@goldfishinternet.com).
