## Install

### System requirements

- PHP:  ^8.0
- Git

#### Installation

Run command: `git clone git@github.com:sergeysksa/transdoc_test_task.git`

copy `.env.example` to `.env`

Run commands: 
- `composer install`
- `php artisan optimize`
- `php artisan migrate --seed`
- `npm i`
- `npm run build`
- open in browser 'http://localhost'

##### Credentials:

Admin creds:

Username: admin@transdoc.com
Password: password

User creds:

Username: user@transdoc.com
Password: password
