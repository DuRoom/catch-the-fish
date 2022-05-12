import {ClassComponent} from 'mithril';
import app from 'duroom/forum/app';

export default class DropArea implements ClassComponent {
    view() {
        return m('.catchthefish-drop-area', app.translator.trans('duroom-catch-the-fish.forum.drop-area.message'));
    }
}
