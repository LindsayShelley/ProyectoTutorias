<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alumnos;

/**
 * AlumnosSearch represents the model behind the search form about `app\models\Alumnos`.
 */
class AlumnosSearch extends Alumnos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'edad', 'nu_carrera'], 'integer'],
            [['nombre', 'paterno', 'materno', 'matricula', 'direccion', 'telefono', 'email', 'sexo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Alumnos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'edad' => $this->edad,
            'nu_carrera' => $this->nu_carrera,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'paterno', $this->paterno])
            ->andFilterWhere(['like', 'materno', $this->materno])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sexo', $this->sexo]);

        return $dataProvider;
    }
}
