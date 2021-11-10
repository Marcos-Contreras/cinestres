import React from 'react'
import { Card, Button, Container } from 'react-bootstrap'

const Home = () => {
    return(
        <Container>
            <Card style={{ width: '18rem' }}>
                <Card.Img variant="top" src="holder.js/100px180" />
                <Card.Body>
                    <Card.Title>Aquí va el título de la película</Card.Title>
                        <Card.Text>
                        Aquí va la sinopsis.
                        </Card.Text>
                        <Button variant="primary">Comprar boletos</Button>
                </Card.Body>
            </Card>
        </Container>
    )
}

export default Home;
