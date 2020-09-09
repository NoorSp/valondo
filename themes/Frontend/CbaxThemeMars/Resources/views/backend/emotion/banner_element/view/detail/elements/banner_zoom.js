//{block name="backend/emotion/view/detail/elements/base"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.Emotion.view.detail.elements.BannerZoom', {

    /**
     * Extend from the base class for the grid elements.
     */
    extend: 'Shopware.apps.Emotion.view.detail.elements.Base',

    /**
     * Create the alias matching with the xtype you defined for your element.
     * The pattern is always 'widget.detail-element-' + xtype
     */
    alias: 'widget.detail-element-emotion-components-banner-zoom',

    /**
     * You can define an additional CSS class which will be used for the grid element.
     */
    componentCls: 'emotion--banner-zoom',

    /**
     * Define the path to an image for the icon of your element.
     * You could also use a base64 string.
     */
    icon: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkZFOTgyNjJENTFBNjExRTc4QjA5OTU5NEZGMUQyNUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkZFOTgyNjJFNTFBNjExRTc4QjA5OTU5NEZGMUQyNUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RkU5ODI2MkI1MUE2MTFFNzhCMDk5NTk0RkYxRDI1QkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RkU5ODI2MkM1MUE2MTFFNzhCMDk5NTk0RkYxRDI1QkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5DI/+bAAAC3ElEQVR42uyYS2gTURSG58b4qA/QKlJFxEd9gRsFQREXot2qKwVtF4IpiFiwblrFJwURMTtf7cJFstCqCxEUEat15wMEFRELWoWIC4sV8ZG26fhdciJDvJOZSZwkoAc+zs3cSfLfO+eecxJ1ujNhW1VkEavKLOoYr4VUBbX05wtK7W9uelcpNYTOHzv0Vz/YYQpycboY3sBUWAU9bELa7ZGFGactMAjrYA68hI2wB3p9CbJt/4dPKVVoehSmQRwGYDo0wBBkCgW10eJdCb3CfbAb5oOOs0441RpryvjQq1d2GD6LqJyNg7eBBWHnIeZ4rUWdgOXQ6HMTa2GK4fqXQHmI3VmZJ8ZpO5hf40PMLDgOx+R1G/TBCHwPmhg3eMw3+BBzUILXEmEn4YAE82jQR6ZKOF0mMUdkfBvSXpnaZPc85u+7XF8qB6HZIEbbV7gRuJZxih7jEi7T3cw/MFzXwbu+gBjftczNdsJrOfaz4aMc+44CeWeyZGS9mKPFFle3XcrIl3dwqqK8HvF4yze4KMXySinV3vIhzkuMRW3S7lMxYqq+HwpSn/7NjvF3hY93Jb3eVy/0tMYah0oRkP8kiumHlknV1i3FMNwtUAv1vZulEOtU8B7uwE23TsGnIDuSLSNqEf6MJL6ncsRNQlbj2mGTYXovvOCe7Yh6HlCQPV4GrEYtxJ8VMXqlF3Tnxwdvw2+RfqdWWtMFHivUO/YIavwKqs+2mqo3218p3QufEzG6QTvE9av4FXCpyPCZEOSR6eK4K/vlKmMQcw0/Dy6HecqcTfQMCca0xIlTTDd+IlyXhj00QT8c41zsbBX/SlcOuAVj5FdDXdiJ0dm9Tcq7b1iCNjdXF1ZijLgE2UzH+CcsgaS0rDXlytTOsY6dh/AM5oJu1D7AWFNjXo7impQM/ER2hCC2UxL4UcnS5RNEfeqTnyqW7MhAXjwNlkVQpVoON0H9hn8u/vdDvwQYAMNCuXBae2gGAAAAAElFTkSuQmCC',

	createPreview: function() {
        var me = this,
            preview = '',
            image = me.getConfigValue('file'),
            position = me.getConfigValue('bannerPosition') || 'center center',
            style;

        if (Ext.isDefined(image)) {
            style = Ext.String.format('background-image: url([0]); background-position: [1];', image, position);

            preview = Ext.String.format('<div class="x-emotion-banner-element-preview" style="[0]"></div>', style);
        }

        return preview;
    }

});
//{/block}