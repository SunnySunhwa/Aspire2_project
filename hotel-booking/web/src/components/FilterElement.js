import React from 'react'
import Button from './Button'
import moment from 'moment'
import { formatTime, startTimeSelectOptions, endTimeSelectOptions } from '../helpers/bookingForm'

const FilterElement = ({

  onSetFloorParam,
  onToggleFeature,

  floorParam,
  filterParams,
  //  date
}) =>
  <div className="sidebar__box--filter filter">
    <h3 className="header__heading header__heading--sidebar">Filter</h3>
    <form className="form form--filter">
      <h4 className="form__heading form__heading--filter">Features</h4>
      <div onChange={(event) => onToggleFeature(event.target.name)} >
        <div className="form__group">
          <input type="checkbox" id="data" name="data" className="form__input--checkbox" defaultChecked={filterParams[0].value} />
          <label htmlFor="data" className="form__label form__label--inline">5G Data</label>
        </div>
        <div className="form_group">
          <input type="checkbox" id="pillowMenu" name="pillowMenu" className="form__input--checkbox" defaultChecked={filterParams[1].value} />
          <label htmlFor="pillowMenu" className="form__label form__label--inline">Pillow Menu</label>
        </div>
        <div className="form_group">
          <input type="checkbox" id="kitchen" name="kitchen" className="form__input--checkbox" defaultChecked={filterParams[2].value} />
          <label htmlFor="kitchen" className="form__label form__label--inline">Kitchen</label>
        </div>
        <div className="form_group">
          <input type="checkbox" id="wideTv" name="wideTv" className="form__input--checkbox" defaultChecked={filterParams[3].value} />
          <label htmlFor="wideTv" className="form__label form__label--inline">Wide TV</label>
        </div>
        <div className="form_group">
          <input type="checkbox" id="extraBed" name="extraBed" className="form__input--checkbox" defaultChecked={filterParams[4].value} />
          <label htmlFor="extraBed" className="form__label form__label--inline">Extra Bed</label>
        </div>
        <div className="form_group">
          <input type="checkbox" id="workStation" name="workStation" className="form__input--checkbox" defaultChecked={filterParams[5].value} />
          <label htmlFor="workStation" className="form__label form__label--inline">Work-Station</label>
        </div>
      </div>
    </form>
  </div>;

export default FilterElement;