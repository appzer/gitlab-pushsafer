![Pushsafer](https://www.pushsafer.com/de/assets/logos/logo.png)
# gitlab-pushsafer
##How to send push-notification out of GitLab with webhooks & Pushsafer
Webhooks can be used for binding events when something is happening within the project.

[Pushsafer.com](https://www.pushsafer.com) make it easy and safe to send &amp; receive push-notifications to your
- Android devices
- iOS devices (iPhone, iPad, iPod Touch, Watch)
- Windows 10 Phone & Desktop
- Browser (Chrome & Firefox)

## Usage
1. open the desired project
2. open the settings dropdown
3. then go to integrations
4. enter the URL from Pushafer, with the required key and optional params
5. select the events which should trigger this webhook
6. add / save the webhook

![Pushsafer](https://www.pushsafer.com/de/assets/examples/gitlab_add_webhook1.jpg)

![Pushsafer](https://www.pushsafer.com/de/assets/examples/gitlab_add_webhook2.jpg)

You can add various webhooks for each project.

## Example webhook URLs
### with private key (20 chars)

	https://www.pushsafer.com/gitlab?k=XXXXXXXXXXXXXXXXXXXX
  
### with alias key (15 chars)

	https://www.pushsafer.com/gitlab?k=XXXXXXXXXXXXXXX
  
### with private key (20 chars) and optional parameters

	https://www.pushsafer.com/gitlab?k=XXXXXXXXXXXXXXXXXXXX?i=4&s=2&v=0&d=23

### Pushsafer API values

Any API parameters, as found on https://www.pushsafer.com/en/pushapi, can be appended to the URL.

## Modify Push-Notification Content (PHP example)

If you want to customize the message text of your push-notification, modify this file to your needs: [github_webhooks.php](https://github.com/appzer/gitlab-pushsafer/blob/master/gitlab_webhooks.php). After that, upload the file to your server and change the payload URL to yours.

## Events that trigger a webhook
1. Push events
2. Tag events
3. Issues events
4. Comment events
5. Comment on merge request
6. Comment on issue
7. Comment on code snippet
8. Merge request events
9. Wiki Page events
10. Pipeline events
11. Build events
