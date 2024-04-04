# Projeto Tampets - Balança de Tampas Plásticas para Apoio à ONG
Descrição do Projeto
O Projeto Tampets é uma iniciativa da ONG Tampets, que visa contribuir para a castração de animais de rua através da coleta e reciclagem de tampas plásticas. A ideia central é utilizar uma balança conectada à nuvem para pesar as tampas plásticas doadas, registrando esses dados em um banco de dados na nuvem e exibindo as informações de forma acessível por meio de uma aplicação web.

Componentes do Projeto
1. Frontend da Aplicação Web
O frontend da aplicação web é a interface que permite aos usuários interagirem com o sistema. Nele, é possível:</br>
•	Cadastrar na agenda de castração: Agendamento para a castração de animais.</br>
•	Visualizar a fila de castração: Lista com os agendamentos pendentes.</br>
•	Visualizar o peso que a balança se encontra no momento: Tela onde o usuário, pode ver o peso da balança em tempo real.</br>


3. Balança com Arduino</br>
•	A balança é construída utilizando um Arduino, responsável por medir o peso das tampas plásticas. Os dados são então enviados para o serviço na nuvem e depois, são mostradas numa página.

5. ThinkSpeak - Banco de Dados e Nuvem</br>
•	ThinkSpeak é a plataforma escolhida para armazenar os dados da balança. Cada pesagem é registrada no banco de dados, permitindo o acesso fácil e seguro às informações e proporciona o consumo de sua API para mostrarmos em tempo real os dados da balança.
