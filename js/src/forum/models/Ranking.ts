import Model from 'duroom/common/Model';
import User from 'duroom/common/models/User';

export default class Ranking extends Model {
    catch_count = Model.attribute('catch_count');
    user: () => User = Model.hasOne('user');
}
