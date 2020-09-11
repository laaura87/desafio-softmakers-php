import React, { useState, useEffect } from 'react';
import api from '../../services/api';
import {
  Container,
  LeftSection,
  RightSection,
  Information,
  Buttons,
} from './styles';
import { FaArrowLeft } from 'react-icons/fa';
import { Contact } from '../../@types';
import { useParams, Link } from 'react-router-dom';
import Button from '../../components/Button';

const Showcontactpage: React.FC = () => {
  const { id } = useParams<any>();
  const [contact, setContact] = useState<Contact>();

  function handleRemove() {
    const confirmRemove = window.confirm('Deseja apagar o contato?');

    if (confirmRemove) {
      const url = `http://localhost:8000/api/contacts/${id}`;

      api.delete(url).then((response) => console.log(response.data));
    }
  }

  useEffect(() => {
    (async function anyNameFunction() {
      try {
        await api
          .get(`/api/contacts/${id}`)
          .then((response) => setContact(response.data.findContact));
      } catch (error) {
        console.log(error);
      }
    })();
  }, []);

  if (!contact) {
    return (
      <Container className="contact-not-found">
        <h1>Contato não encontrado</h1>
        <LeftSection>
          <Link to="/">
            <FaArrowLeft />
            <span>Voltar para o início</span>
          </Link>
        </LeftSection>
      </Container>
    );
  }

  return (
    <Container>
      <LeftSection>
        <Link to="/">
          <FaArrowLeft />
          <span>Voltar para o início</span>
        </Link>
        <div>
          <img
            src={`http://localhost:8000/storage/images/${contact?.image}`}
            alt={contact?.name}
          />
        </div>
      </LeftSection>
      <RightSection>
        <Information>
          <div>
            <h4>Nome: </h4>
            <p>{contact?.name}</p>
            <h4>Sobrenome: </h4>
            <p>{contact?.surname}</p>
            <h4>Telefone: </h4>
            <p>{contact?.phone}</p>
            <h4>E-mail: </h4>
            <p>{contact?.email}</p>
          </div>
          <div>
            <h4>Estado: </h4>
            <p>{contact?.state.toLocaleUpperCase()}</p>
            <h4>Cidade: </h4>
            <p>{contact?.city}</p>
            <h4>Endereço: </h4>
            <p>{contact?.street}</p>
            <h4>Número: </h4>
            <p>{contact?.number}</p>
            <h4>CEP: </h4>
            <p>{contact?.cep}</p>
          </div>
        </Information>
        <Buttons>
          <Link to={`/${id}/edit`}>
            <Button title="Editar" />
          </Link>
          <Link to="/" onClick={handleRemove}>
            <Button title="Apagar" className="delete" />
          </Link>
        </Buttons>
      </RightSection>
    </Container>
  );
};

export default Showcontactpage;
