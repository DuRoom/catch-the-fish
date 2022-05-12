import app from 'duroom/forum/app';
import Modal from 'duroom/common/components/Modal';
import EditRound from '../components/EditRound';

const translationPrefix = 'duroom-catch-the-fish.forum.new-round-modal.';

export default class NewRoundModal extends Modal {
    className() {
        return 'Modal--small';
    }

    title() {
        return app.translator.trans(translationPrefix + 'title');
    }

    content() {
        return m('.Modal-body', m(EditRound, {
            onsave: () => {
                this.hide();

                if (this.attrs.oncreateordelete) {
                    this.attrs.oncreateordelete();
                }
            },
        }));
    }
}
