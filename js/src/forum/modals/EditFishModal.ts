import app from 'duroom/forum/app';
import Modal from 'duroom/common/components/Modal';
import EditFish from '../components/EditFish';

const translationPrefix = 'duroom-catch-the-fish.forum.edit-fish-modal.';

export default class EditRoundModal extends Modal {
    className() {
        return 'Modal--small';
    }

    title() {
        return app.translator.trans(translationPrefix + 'title', {
            name: this.attrs.fish.name(),
        });
    }

    content() {
        return m('.Modal-body', m(EditFish, {
            fish: this.attrs.fish,
            ondelete: () => {
                this.hide();

                if (this.attrs.oncreateordelete) {
                    this.attrs.oncreateordelete();
                }
            },
        }));
    }
}
