<p align="left" style="background:#000000;">
<a href="https://www.goldfishinternet.com"><img src="https://www.goldfishinternet.com/assets/images/logo/goldfish-interactive-color-logo.png" alt="Goldfish Internet"></a>
</p>

<h1>Goldfish Invoices</h1>
## Topics

1. [Introduction](#introduction)
2. [Documentation](#documentation)
3. [Requirements](#requirements)
4. [Installation & Configuration](#installation-and-configuration)
5. [License](#license)
6. [Security Vulnerabilities](#security-vulnerabilities)

### Introduction

[Goldfish Invoices](https://www.goldfishinternet.com) is a lightweight invoice web application built with [Laravel](https://laravel.com) with the very excellent [Quick Admin Panel](https://quickadminpanel.com/)
crud generator. It utilises [LiveWire](https://laravel-livewire.com/) full stack framework and [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/) CSS framework. 

*Demo Laravel Invoice prototype targeted at individuals, freelancers and SMEs.*

Primarily intended to satisfy my own needs as a freelance web developer, I am also using it to gain further real work experience building Laravel and LiveWire web application solutions

**This prototype is currently only partially complete but invoicing is functional enough for me to be using in production to create and generate PDF invoices**

# Visit the [Demo](https://www.goldfishinternet.com)

Features currently include:

-   Authentication.
-   Admin Dashboard.
-   Client Records.
-   Client Contact Records.
-   Invoice and Invoice Items.
-   PDF Invoice Generator.
-   Invoice Payments.
-   Invoice Notes

### Documentation

#### Come back soon

### Requirements

-   **SERVER**: Apache 2 or NGINX.
-   **RAM**: 2 GB or higher.
-   **PHP**: 8 or higher.
-   **For MySQL users**: 5.7.23 or higher.
-   **For MariaDB users**: 10.2.7 or Higher.
-   **Node**: 8.11.3 LTS or higher.
-   **Composer**: 1.6.5 or higher.

### Installation and Configuration

##### Execute these commands below, in order

```
composer create-project krayin/laravel-crm
```

-   Find **.env** file in root directory and change the **APP_URL** param to your **domain**.

-   Also, Configure the **Mail** and **Database** parameters inside **.env** file.
.
```
php artisan krayin-crm:install
```

**To execute Krayin**:

##### On server:

Warning: Before going into production mode we recommend you uninstall developer dependencies.
In order to do that, run the command below:

> composer install --no-dev

```
Open the specified entry point in your hosts file in your browser or make an entry in hosts file if not done.
```

##### On local:

```
php artisan route:clear
php artisan serve
```


**How to log in as admin:**

> _http(s)://example.com/admin/login_

```
email:admin@example.com
password:admin123
```

### License

Krayin CRM is a truly opensource CRM framework which will always be free under the [MIT License](https://github.com/krayin/laravel-crm/blob/master/LICENSE).

### Security Vulnerabilities

Please don't disclose security vulnerabilities publicly. If you find any security vulnerability in Krayin CRM then please email us: mailto:sales@krayincrm.com.
