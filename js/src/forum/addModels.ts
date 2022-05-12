import app from 'duroom/forum/app';
import Model from 'duroom/common/Model';
import Discussion from 'duroom/common/models/Discussion';
import Post from 'duroom/common/models/Post';
import User from 'duroom/common/models/User';
import Forum from 'duroom/common/models/Forum';
import Fish from './models/Fish';
import Ranking from './models/Ranking';
import Round from './models/Round';

export default function () {
    app.store.models['catchthefish-fishes'] = Fish;
    app.store.models['catchthefish-rankings'] = Ranking;
    app.store.models['catchthefish-rounds'] = Round;

    Discussion.prototype.catchTheFishFishes = Model.hasMany('catchTheFishFishes');
    Post.prototype.catchTheFishFishes = Model.hasMany('catchTheFishFishes');
    User.prototype.catchTheFishFishes = Model.hasMany('catchTheFishFishes');
    User.prototype.catchTheFishBasket = Model.hasMany('catchTheFishBasket');
    Forum.prototype.catchTheFishActiveRounds = Model.hasMany('catchTheFishActiveRounds');
    Forum.prototype.catchTheFishCanModerate = Model.attribute('catchTheFishCanModerate');
    Forum.prototype.catchTheFishCanSeeRankingsPage = Model.attribute('catchTheFishCanSeeRankingsPage');
    Forum.prototype.catchTheFishAnimateFlip = Model.attribute('catchTheFishAnimateFlip');
}
