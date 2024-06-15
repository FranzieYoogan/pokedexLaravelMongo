import express from 'express';
import bodyParser from 'body-parser';
import { MongoClient, ObjectId } from 'mongodb';
import cors from 'cors';

const app = express();
const port = 3000;
const url = 'mongodb+srv://ivyarvrock:321654456123@cluster0.qk4hzjr.mongodb.net/';
const dbName = 'pokedexLaravel';
let db;

app.use(bodyParser.json());
app.use(cors());

// Connect to MongoDB
MongoClient.connect(url, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(client => {
    console.log('Connected to Database');
    db = client.db(dbName);
  })
  .catch(err => console.error(err));

// Create
app.post('/users', (req, res) => {
  const item = req.body;
  db.collection('users').insertOne(item)
    .then(result => res.status(201).send(result.ops[0]))
    .catch(err => res.status(500).send(err));
});

// Read All
app.get('/users', (req, res) => {
  db.collection('users').find().toArray()
    .then(users => res.status(200).send(users))
    .catch(err => res.status(500).send(err));
});

// Read One
app.get('/users/:id', (req, res) => {
  const id = req.params.id;
  db.collection('users').findOne({ _id: new ObjectId(id) })
    .then(item => {
      if (!item) return res.status(404).send('Item not found');
      res.status(200).send(item);
    })
    .catch(err => res.status(500).send(err));
});

// Update
app.put('/users/:id', (req, res) => {
  const id = req.params.id;
  const updatedItem = req.body;
  db.collection('users').updateOne(
    { _id: new ObjectId(id) },
    { $set: updatedItem }
  )
    .then(result => {
      if (result.matchedCount === 0) return res.status(404).send('Item not found');
      res.status(200).send('Item updated');
    })
    .catch(err => res.status(500).send(err));
});

// Delete
app.delete('/users/:id', (req, res) => {
  const id = req.params.id;
  db.collection('users').deleteOne({ _id: new ObjectId(id) })
    .then(result => {
      if (result.deletedCount === 0) return res.status(404).send('Item not found');
      res.status(200).send('Item deleted');
    })
    .catch(err => res.status(500).send(err));
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
