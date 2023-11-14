package auth

type Service struct {
	database DataSource
}

type DataSource interface {
}

func New(dataSource DataSource) *Service {
	return &Service{
		database: dataSource,
	}
}
