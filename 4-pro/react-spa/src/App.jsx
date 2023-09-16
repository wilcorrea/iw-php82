import { useState } from 'react'
import './App.css'

function App() {
  const [rows, setRows] = useState([])
  const [record, setData] = useState({ nome: '', valor: 0 })
  const handleChange = e => setData({ ...record, [e.target.name]: e.target.value })

  const submit = async (event) => {
    // impede que o evento original aconteça
    event.preventDefault()
    // configurando o payload
    const options = {
      method: 'POST',
      headers: {
        "Content-Type": "application/json",
        // 'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: JSON.stringify(record)
    }
    try {
      // fazendo o request
      await fetch('http://127.0.0.1:8000/api/produtos', options)
      setData({ nome: '', valor: 0 })
      await refresh()
    } catch (e) {
      console.error(e)
    }
  }

  const refresh = async () => {
    const options = {
      headers: {
        "Content-Type": "application/json",
        // 'Content-Type': 'application/x-www-form-urlencoded',
      }
    }

    try {
      // fazendo o request
      const response = await fetch('http://127.0.0.1:8000/api/produtos', options)
      const data = await response.json()
      setRows(data)
    } catch (e) {
      console.error(e)
    }
  }

  const destroy = async (id) => {
    const options = {
      method: 'DELETE',
      headers: {
        "Content-Type": "application/json",
        // 'Content-Type': 'application/x-www-form-urlencoded',
      }
    }

    try {
      // fazendo o request
      await fetch(`http://127.0.0.1:8000/api/produtos/${id}`, options)
      await refresh()
    } catch (e) {
      console.error(e)
    }
  }

  return (
    <>
      <div className="row">
        <div className="col-4">
          <form onSubmit={submit}>
            <div className="mb-3">
              <label htmlFor="exampleInputNome" className="form-label">Nome</label>
              <input
                type="text"
                className="form-control"
                id="exampleInputNome"
                aria-describedby="nomeHelp"
                name="nome"
                value={record.nome}
                onChange={e => handleChange(e)}
              />
              <div id="nomeHelp" className="form-text">Digite um nome de produto</div>
            </div>
            <div className="mb-3">
              <label htmlFor="exampleInputValor" className="form-label">Valor</label>
              <input
                type="number"
                className="form-control"
                id="exampleInputValor"
                name="valor"
                value={record.valor}
                onChange={e => handleChange(e)}
              />
            </div>
            <div className="mb-3 form-check">
              <input
                type="checkbox"
                className="form-check-input"
                id="exampleCheck1"
              />
              <label className="form-check-label" htmlFor="exampleCheck1">Ativo</label>
            </div>
            <button type="submit" className="btn btn-primary">Salvar</button>
          </form>
        </div>
        <div className="col-8">
          <button onClick={refresh} className='btn btn-info'>Atualizar</button>
          <table className="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Ativo</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              {rows.map((row) => {
                return (
                  <tr key={row.id}>
                    <th scope='row'>
                      {row.id}
                    </th>
                    <td>{row.nome}</td>
                    <td>{row.valor}</td>
                    <td>{row.ativo ?? '-'}</td>
                    <td>
                      <button onClick={() => destroy(row.id)}>Apagar</button>
                    </td>
                  </tr>
                )
              })}
              {/*
            @foreach ($produtos as $produto)
            <tr>
                <th scope="row">
                    <a href="/produtos/{{ $produto->id }}/edit">{{ $produto->id }}</a>
                </th>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->valor }}</td>
                <td>{{ $produto->ativo ?? '-' }}</td>
                <td>
                    <form
                        action="/produtos/{{ $produto->id }}"
                        method="POST"
                    >
                        @method ('DELETE')
                        @csrf
                        <button>Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            */}
            </tbody>
          </table>
        </div>
      </div>
    </>
  )
}

export default App
