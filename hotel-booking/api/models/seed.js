require('dotenv').load()
const Room = require('./Room')

Room.create([
  {
    name: 'Room 1',
    roomType: 'Standard',
    bedType: 'Single',
    assets: {
      data: true,
      wideTv: true
    }
  },
  {
    name: 'Room 2',
    roomType: 'Standard',
    bedType: 'Single',
    assets: {
      data: true,
      workStation: true
    }
  },
  {
    name: 'Room 3',
    roomType: 'Standard',
    bedType: 'Twin',
    assets: {
      extraBed: true,
      wideTv: true
    }
  },
  {
    name: 'Room 4',
    roomType: 'Standard',
    bedType: 'Double',
    assets: {
      kitchen: true,
      data: true,
      wideTv: true
    }
  },
  {
    name: 'Room 5',
    roomType: 'Standard',
    bedType: 'Twin',
    assets: {
      data: true,
      wideTv: true
    }
  },
  {
    name: 'Room 6',
    roomType: 'Standard',
    bedType: 'Double',
    assets: {
      kitchen: true,
    }
  },
  {
    name: 'Room 7',
    roomType: 'Standard',
    bedType: 'Double',
    assets: {
      wideTv: true
    }
  },
  {
    name: 'Room 8',
    roomType: 'Standard',
    bedType: 'Double',
    assets: {
      data: true
    }
  },
  {
    name: 'Room 9',
    roomType: 'Standard',
    bedType: 'Twin',
  },
  {
    name: 'Room 10',
    roomType: 'Standard',
    bedType: 'Single',
  },
  {
    name: 'Room 11',
    roomType: 'Standard',
    bedType: 'Double',
    assets: {
      data: true,
      workStation: true
    }
  },
  {
    name: 'Room 12',
    roomType: 'Deluxe',
    bedType: 'Double',
    assets: {
      data: true,
      wideTv: true,
      kietchen: true
    }
  },
  {
    name: 'Room 13',
    roomType: 'Deluxe',
    bedType: 'Double',
    assets: {
      wideTv: true,
      kietchen: true
    }
  },
  {
    name: 'Room 14',
    roomType: 'Deluxe',
    bedType: 'Queen',
    assets: {
      wideTv: true,
      extraBed: true
    }
  },
  {
    name: 'Room 15',
    roomType: 'Deluxe',
    bedType: 'King',
    assets: {
      pillowMenu: true,
      wideTv: true
    }
  },
  {
    name: 'Room 16',
    roomType: 'Deluxe',
    bedType: 'King',
    assets: {
      pillowMenu: true,
      wideTv: true
    }
  },
  {
    name: 'Room 17',
    roomType: 'Deluxe',
    bedType: 'King',
    assets: {
      pillowMenu: true,
      wideTv: true,
      kitchen: true
    }
  },
  {
    name: 'Room 18',
    roomType: 'Deluxe',
    bedType: 'King',
    assets: {
      pillowMenu: true,
      wideTv: true,
      data: true,
      extraBed: true
    }
  },
])
  .then((rooms) => {
    console.log(`Created ${rooms.length} rooms.`)
  })
  .catch((error) => {
    console.error(error)
  })