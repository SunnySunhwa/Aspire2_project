import moment from 'moment'
import { formatTime, timeSelectOptions } from '../helpers/bookingForm'


export const floorParams = [{ name: '8', value: false }, { name: '13', value: false }, { name: 'all', value: false }]
// initial feature filter parameters
export const filterParams = [
  { name: 'data', value: false },
  { name: 'pillowMenu', value: false },
  { name: 'kitchen', value: false },
  { name: 'wideTv', value: false },
  { name: 'extraBed', value: false },
  { name: 'workStation', value: false },
]


// Filter roomData by floor
export const onFilterByFloor = (param, filteredData) => {
  if (param === 'all') {
    return filteredData
  } else {
    return filteredData.filter(room => room.floor === param)
  }
}
// Filter data by feature
export const onFilterByFeature = (params, filteredData) => {
  params.forEach(feature => {
    if (feature.name === 'data' && feature.value === true) {
      filteredData = filteredData.filter(room => room.assets.data === true)
    } else if (feature.name === 'pillowMenu' && feature.value === true) {
      filteredData = filteredData.filter(room => room.assets.pillowMenu === true)
    } else if (feature.name === 'kitchen' && feature.value === true) {
      filteredData = filteredData.filter(room => room.assets.kitchen === true)
    } else if (feature.name === 'wideTv' && feature.value === true) {
      filteredData = filteredData.filter(room => room.assets.owideTv === true)
    } else if (feature.name === 'extraBed' && feature.value === true) {
      filteredData = filteredData.filter(room => room.assets.extraBed === true)
    } else if (feature.name === 'workStation' && feature.value === true) {
      filteredData = filteredData.filter(room => room.assets.workStation === true)
    }
  })
  return filteredData
}