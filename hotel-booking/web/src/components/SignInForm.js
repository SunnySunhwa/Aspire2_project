import React from 'react'
import { Link } from 'react-router-dom'

function SignInForm({ onSignIn }) {
  return (
    <form className="form--signin"
      onSubmit={event => {
        event.preventDefault()
        const elements = event.target.elements
        const email = elements.email.value
        const password = elements.password.value
        onSignIn({ email, password })
      }}
    >
      <div className="form__group">
        <label className="form__label form__label--padding">
          {'Email'}
          <input type="email" name="email" className="form__input" required />
        </label>
      </div>
      <div className="form__group">
        <label className="form__label form__label--padding">
          {'Password'}
          <input type="password" name="password" className="form__input" required />
        </label>
      </div>
      <button className="button button__form--submit">Sign in</button>
      <Link to="/signup"><button className="button2 button__form--submit">Sign up</button></Link>
    </form>
  )
}

export default SignInForm
