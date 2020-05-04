import moment from 'moment'
import 'moment-timezone'

/**
 * convert
 * @param date
 * @returns {number}
 */
const convertDatetimeToTimestamp = (date) => {
    date = moment(date).format('YYYY-MM-DDTHH:mm:ss')
    return moment.tz(date, 'Asia/Tokyo').unix()
}

/**
 *
 * @param bytes
 * @returns {string}
 */
const convertSize = (bytes) => {
    if (bytes === 0 || bytes === null) return '0 Byte';

    const k = 1024;

    const sizes = ['B', 'KB', 'MB', 'GB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

/**
 * get file extension
 * @param url
 */
const getFileExtension = (url) => {
    if (url === null) {
        return ''
    }
    let index = url.lastIndexOf('/')
    if (index !== -1) {
        url = url.substring(index + 1) // Keep path without its segments
    }
    index = url.indexOf('?')
    if (index !== -1) {
        url = url.substring(0, index) // Remove query
    }
    index = url.indexOf('#')
    if (index !== -1) {
        url = url.substring(0, index) // Remove fragment
    }
    index = url.lastIndexOf('.')
    return index !== -1 ? url.substring(index + 1) : ''
}

/**
 * get Query from url
 */
const getUrlSetQuery = (query) => {
    query = _.reduce(query, (result, item, key) => {
        if (key === 'page' || key === 'perPage') {
            result[key] = parseInt(item)
        } else {
            result[key] = item
        }
        return result
    }, {})
    return {...query}
}

export const Helper = {
    convertSize,
    convertDatetimeToTimestamp,
    getFileExtension,
    getUrlSetQuery
}
