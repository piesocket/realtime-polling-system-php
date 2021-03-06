# Realtime Polling System
Real-time polling system with  PieSocket

## Tutorial
There is a tutorial for this repository published on PieSocket: [Building A Polling System With WebSockets in PHP](https://www.piesocket.com/blog/polling-system-in-php-with-websocket/)

## Configurations
Add PieSocket credentials in following files 
- `partials/functions.php`
- `js/result.js`
- `js/voter.js`

## Usage
- Open `admin.php` in a tab
- Open `voter.php` in single or multiple tabs
- Push a question from `admin.php`
- The questions should appear on all voter tabs 
- Click "View result" on admin tab to open the results page.
- Publish results from voter tabs and you should see results reflect on the results tab