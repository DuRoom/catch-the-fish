import app from 'duroom/admin/app';
import SettingsPage from './SettingsPage';

app.initializers.add('duroom-catch-the-fish', () => {
    app.extensionData.for('duroom-catch-the-fish')
        .registerPage(SettingsPage)
        .registerPermission({
            icon: 'fas fa-fish',
            label: app.translator.trans('duroom-catch-the-fish.admin.permissions.visible'),
            permission: 'catchthefish.visible',
            allowGuest: true,
        }, 'view')
        .registerPermission({
            icon: 'fas fa-fish',
            label: app.translator.trans('duroom-catch-the-fish.admin.permissions.list-rankings'),
            permission: 'catchthefish.list-rankings',
            allowGuest: true,
        }, 'view')
        .registerPermission({
            icon: 'fas fa-fish',
            label: app.translator.trans('duroom-catch-the-fish.admin.permissions.participate'),
            permission: 'catchthefish.participate',
        }, 'reply')
        .registerPermission({
            icon: 'fas fa-fish',
            label: app.translator.trans('duroom-catch-the-fish.admin.permissions.choose-place'),
            permission: 'catchthefish.choose-place',
        }, 'reply')
        .registerPermission({
            icon: 'fas fa-fish',
            label: app.translator.trans('duroom-catch-the-fish.admin.permissions.choose-name'),
            permission: 'catchthefish.choose-name',
        }, 'reply')
        .registerPermission({
            icon: 'fas fa-fish',
            label: app.translator.trans('duroom-catch-the-fish.admin.permissions.moderate'),
            permission: 'catchthefish.moderate',
        }, 'moderate');
});
