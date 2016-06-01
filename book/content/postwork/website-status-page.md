# Website Status Page

Oftentimes, people ask the question: *"Is my website up?"*

This is an important question, since the answer usually determines a series of follow-up questions, such as:

```
if (website.status == 'down') {
    follow_up = "Why?  What am I paying you for?";
}
```

Usually, if the site is down, then the customer is unhappy. Sites that are not up, are not making any money. And customers like money. We like it when customers pay us for our work, so it is in our mutual interest to keep these sites up at all times.

Luckily, there are easier ways to make sure our sites are up and publicly available than hitting refresh 10,000 times a day. Some of these are available on the internet for free.

---

**You are going to create your own custom solution, and it needs to be able to do the following:**

1. Perform a DNS lookup of the site, retrieving which the server's IP address by checking the assigned `A` record.
1. Access the site via an HTTP `GET` request and verify the status code (Example: 200 OK).
1. Send an eMail or SMS message to your cell phone if one of your sites is down.
1. Configure your script to be run every five minutes via a cron job.
1. **Bonus:** Confirm that both Nginx and MySQL are running and actively listening for connections.

---

You can do this all in one PHP script that resides on the server, or you could build out a whole administrative portal that allows you to view the information your script returns. The scope and quality of your solution is up to you, but the core functionality is critical. We need to know whether our sites are returning a 200 OK status, and we need to be notified as soon as they are not.

---

## Additional Resources:

- [HTTP Status Codes](https://support.google.com/webmasters/answer/40132?hl=en)
- [PHP Network Functions (including DNS)](http://php.net/manual/en/ref.network.php)
- [PHP cURL Library](http://php.net/manual/en/book.curl.php)
