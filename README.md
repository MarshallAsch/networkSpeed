
# Network Monitoring

This is a PHP web page that will monitor the network speed for my 3 servers. And will display a graph for the:

- Upload speed
- Download speed
- Ping time


It is built using a BASH shell script that is run every hour from crontab, a mySQL database and it used canvasjs for the graphing.

## Usage

On the netwok that you wish to monitor intall [speedtest-cli](https://github.com/sivel/speedtest-cli), a commandline interface that uses [speedtest.net](speedtest.net) to check network speeds.

On the server where you want to host the webpage place all of the php files. In the [networkSpeedTest.sh](https://github.com/MarshallAsch/networkSpeed/blob/master/networkSpeedTest.sh) file change the `server` variable to point to your web page.


To view the graph of your network speed fo to the [networkDisplay.php](https://github.com/MarshallAsch/networkSpeed/blob/master/networkDisplay.php) page. Or [networkLog.php](https://github.com/MarshallAsch/networkSpeed/blob/master/networkLog.php) to view the data for all the servers in a table.
