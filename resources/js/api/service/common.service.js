import {ApiService} from '../api.service.js'

const resource = '/common/bulk_delete'

export default {
    deleteItems(params = {}) {
        return ApiService.post(`${resource}`, params)
    },
}
