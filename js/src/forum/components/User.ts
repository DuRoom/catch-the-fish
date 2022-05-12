import {ClassComponent, Vnode} from 'mithril';
import app from 'duroom/forum/app';
import Link from 'duroom/common/components/Link';
import avatar from 'duroom/common/helpers/avatar';
import username from 'duroom/common/helpers/username';
import UserModel from 'duroom/common/models/User';

interface UserAttrs {
    user: UserModel
}

export default class User implements ClassComponent<UserAttrs> {
    view(vnode: Vnode<UserAttrs, this>) {
        const {user} = vnode.attrs;

        return m(Link, {
            href: app.route.user(user),
        }, [
            avatar(user),
            ' ',
            username(user),
        ]);
    }
}
