import app from 'duroom/forum/app';
import Modal from 'duroom/common/components/Modal';
import EditRound from '../components/EditRound';

const translationPrefix = 'duroom-catch-the-fish.forum.edit-round-modal.';

export default class EditRoundModal extends Modal {
    className() {
        return 'Modal--small';
    }

    title() {
        return app.translator.trans(translationPrefix + 'title', {
            name: this.attrs.round.name(),
        });
    }

    content() {
        return m('.Modal-body', m(EditRound, {
            round: this.attrs.round,
            ondelete: () => {
                this.hide();

                if (this.attrs.oncreateordelete) {
                    this.attrs.oncreateordelete();
                }
            },
        }));
    }
}
