<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiagnosticoGrupal;

/**
 * DiagnosticoGrupalSearch represents the model behind the search form about `app\models\DiagnosticoGrupal`.
 */
class DiagnosticoGrupalSearch extends DiagnosticoGrupal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nu_alumnos', 'nu_docentes'], 'integer'],
            [['descripcion_general', 'sesion'], 'safe'],
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
        $query = DiagnosticoGrupal::find();

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
            'nu_alumnos' => $this->nu_alumnos,
            'nu_docentes' => $this->nu_docentes,
        ]);

        $query->andFilterWhere(['like', 'descripcion_general', $this->descripcion_general])
            ->andFilterWhere(['like', 'sesion', $this->sesion]);

        return $dataProvider;
    }
}
