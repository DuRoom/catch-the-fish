import Mithril from 'mithril';
import * as _dayjs from 'dayjs';

declare global {
    const m: Mithril.Static;
    const dayjs: typeof _dayjs;

    interface DuRoomExports {
        extensions: {
            [id: string]: any
        }
        core: {
            compat: {
                [id: string]: any
            }
        }
    }

    const duroom: DuRoomExports
}

import Fish from './src/forum/models/Fish';
import Round from './src/forum/models/Round';

declare module 'duroom/common/models/User' {
    export default interface User {
        catchTheFishBasket(): Fish[] | false
    }
}

declare module 'duroom/common/models/Forum' {
    export default interface Forum {
        catchTheFishActiveRounds(): Round[] | false

        catchTheFishCanModerate(): boolean

        catchTheFishCanSeeRankingsPage(): boolean

        catchTheFishAnimateFlip(): boolean
    }
}

declare module 'duroom/forum/ForumApplication' {
    export default interface ForumApplication {
        draggedFishId?: string | null
    }
}
