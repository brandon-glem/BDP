const express = require('express');
const { graphqlHTTP } = require('express-graphql');
const { buildSchema } = require('graphql');

// Datos de ejemplo
const booksData = [
  { id: 1, title: 'El Gran Gatsby', author: 'F. Scott Fitzgerald' },
  { id: 2, title: '1984', author: 'George Orwell' },
  { id: 3, title: 'Matar a un ruiseñor', author: 'Harper Lee' }
];

// Definición del esquema GraphQL
const schema = buildSchema(`
  type Book {
    id: ID
    title: String
    author: String
  }

  type Query {
    book(id: ID!): Book
    books: [Book]
  }
`);

// Resolutores para las consultas
const root = {
  book: ({ id }) => {
    return booksData.find(book => book.id === parseInt(id));
  },
  books: () => {
    return booksData;
  }
};

const app = express();

app.use('/graphql', graphqlHTTP({
  schema: schema,
  rootValue: root,
  graphiql: true
}));

const PORT = 3000;

app.listen(PORT, () => {
  console.log(`Servidor GraphQL en ejecución en http://localhost:${PORT}/graphql`);
});
