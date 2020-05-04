import commonService from '../../api/service/common.service'
import Vue from 'vue'

export const namespaced = true

const actions = {
    deleteItems({commit}, body = {}) {
        return commonService.deleteItems(body)
    },
}

export default {
    namespaced,
    actions,
}
