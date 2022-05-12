import {extend} from 'duroom/common/extend';
import ItemList from 'duroom/common/utils/ItemList';
import HeaderPrimary from 'duroom/forum/components/HeaderPrimary';
import Basket from './components/Basket';

export default function () {
    extend(HeaderPrimary.prototype, 'items', function (items: ItemList) {
        items.add('catchthefish-basket', m(Basket));
    });
}
