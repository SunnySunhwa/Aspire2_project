const config = require('../config')
const mongoose = require('mongoose')

mongoose.Promise = global.Promise

mongoose.connect(config.MONGO_URI, { useMongoClient: true })

  .then(() => {
    console.log('Successfully connected to database')
  })

  .catch(error => {
    console.error('Error connecting to MongoDB database', error)
  })

module.exports = mongoose
