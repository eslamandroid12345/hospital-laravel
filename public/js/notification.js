var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewTicketNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<a href="#">

<div class="media-body">
<h6 class="media-heading text-right"> ` + data.user +`</h6>
<p class="notification-text font-small-3 text-muted text-right">` + data.phone + `</p>
<small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">` + data.patient_address +`</p> </small>
<small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">` +   data.operation +`</p> </small>
<small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">` + data.date +`</p> </small>
</div>
</div>
</a>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
